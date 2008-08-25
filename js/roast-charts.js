function findRoasts(){
  dojo.query("table.roast").forEach(function(n, i){
    if(!n.id) n.id = "roast" + i;
    var store = new dojox.data.HtmlStore({dataId: n.id});
    dojo.style(n, "display", "none");
    store.fetch({onComplete: makeCharts });
  });
}

function makeSeries(store, arr, name, transform){
  return dojo.map(arr,
                  function(n,i){ return { x: i+1,
                                          y: transform(store.getValue(n, name)),
                                          tooltip: store.getValue(n, name) + "<div>" + store.getValue(n, "Notes") + "</div>"  }; });
}

function makeXLabels(store, arr) {
  var labels = [];
  for(var x = 0; x < 20 * 2; x++) {
    labels.push({ value: x, text: Math.floor(x/2).toString() +  ":" + (x % 2 ? "30": "00")});
  }
  return labels;
}

function makeCharts(data, request){
	var div = dojo.doc.createElement("div");
	dojo.addClass(div, "roastChart");
        dojo.body().appendChild(div);

	var chart = new dojox.charting.Chart2D(div);
	var plot = chart.addPlot("default", {type: "Lines", markers: true, tension: 10});
	chart.addPlot("grid", { type: "Grid", hMajorLines: true, vMajorLines: false });
	chart.addAxis("x", { fixLower: "major",
     	                     fixUpper: "major",
                             labels: makeXLabels(request.store, data),
	                     majorTickStep: 2, minorTickStep: 1,
                             min: 0, max: 19*2});
	chart.addAxis("y", { min:100, max: 450, majorTickStep: 25, fixLower: "major", fixUpper: "major", natural: true, vertical: true});
	var series = makeSeries(request.store, data, "Temp", Number);
  	chart.addSeries("Temp", series);
	var hg = new dojox.charting.action2d.Highlight(chart, "default");
	var tt = new dojox.charting.action2d.Tooltip(chart, "default");
	var mg = new dojox.charting.action2d.Magnify(chart, "default");
	chart.render();
}

dojo.addOnLoad(findRoasts);
