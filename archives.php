<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header(); ?>

<!-- html structure based on http://microformats.org/wiki/hatom -->
<div id="content" class="hfeed">
  
  <?php if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>

<h2 class="entry-title"><?php the_title(); ?></h2>
<?php
global $post;
$myposts = get_posts('numberposts=1000000');
$year = '';
$mo = -1;
foreach($myposts as $post):
  $newmo = '';
	$d = getdate(get_the_time('U'));
  if($d['mon'] != $mo) { 
    $mo = $d['mon'];
    $newmo = ' newmonth';
  }
	if($d['year'] != $year):
  		$year = $d['year']; 
?>
</ul>
<h3 class="year"><?php echo $year; ?></h3>
<ul class="archives">
<?php endif; ?>
<li class="<?php echo $newmo; ?>"><span class="datetime"><?php the_time('M d'); ?></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

  <?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
