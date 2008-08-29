function findRoasts(){
  dojo.query("table.roast").forEach(function(n, i){
    if(!n.id) n.id = "roast" + i;
    var store = new dojox.data.HtmlStore({dataId: n.id});
    dojo.style(n, "display", "none");
    var d = dojo.doc.createElement("div");
    dojo.place(d, n, "after");
    dojo.addClass(d, "roastChart");
    d.id = n.id + "Chart";
    store.fetch({onComplete: makeCharts });
  });
}

function makeXIntercept(t){
  //turn a time like 5:30 into an x-location
  var bits = t.split(":");
  return Number(bits[0]) + (Number(bits[1])/60);
}

function makeSeries(store, arr, name, transform){
  return dojo.map(arr,
                  function(n,i){ return { x: makeXIntercept(store.getValue(n, "Time")),
                                          y: transform(store.getValue(n, name)),
                                          tooltip: store.getValue(n, "Time") + ": " + store.getValue(n, name) + "F<div>" + store.getValue(n, "Notes") + "</div>"  }; });
}

dojo.require("dojox.charting.widget.Legend");

function makeCharts(data, request){
	var div = dojo.byId(request.store.dataId + "Chart");
	var chart = new dojox.charting.Chart2D(div);
	//chart.setTheme(dojox.charting.themes.PlotKit.blue);
	chart.addPlot("default", {type: "Lines", markers: true, tension: 10});
	chart.addPlot("hottop", { type: "Lines", vAxis: "ht-y" });
	//chart.addPlot("grid", { type: "Grid", hMajorLines: true, vMajorLines: false });
	chart.addAxis("x", { fixLower: "major",
     	                     fixUpper: "major",
	                     majorTickStep: 1, minorTickStep: 0.5,
                             min: 0, max: 21, includeZero: true});
	chart.addAxis("y", { min:100, max: 450, majorTickStep: 25, fixLower: "major", fixUpper: "major", natural: true, vertical: true});
	chart.addAxis("ht-y", { vertical: true, leftBottom: false, min: 0, max: 125, majorTickStep: 10, minorTickStep: 5 });
	var series = makeSeries(request.store, data, "Temp", Number);
  	chart.addSeries("Temp", series);
	chart.addSeries("Heater", makeSeries(request.store, data, "Heater", Number), { plot: "hottop", stroke: { color: "#bb0000" } });
	chart.addSeries("Fan", makeSeries(request.store, data, "Fan", Number), { plot: "hottop", stroke: { color: "#0000bb" } });
	
	var hg = new dojox.charting.action2d.Highlight(chart, "default");
	var tt = new dojox.charting.action2d.Tooltip(chart, "default");
	//var mg = new dojox.charting.action2d.Magnify(chart, "default");
	chart.render();
	var legend1 = new dojox.charting.widget.Legend({ chart: chart, horizontal: true });
	dojo.place(legend1.domNode, div, "after");

}

dojo.addOnLoad(findRoasts);
