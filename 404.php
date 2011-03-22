<?php header("HTTP/1.1 404 Not Found"); ?>
<?php header("Status: 404 Not Found"); ?>
<?php get_header(); ?>
<div id="content" class="hfeed">
<h1 class="entry-title">Where did I put that...</h1>
<div class="entry-content">
<p>Sorry, I can't seem to find what you're looking for. Try using the search box over there in the sidebar, 
   or check out the <a href="/archives">archives</a>.</p>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
