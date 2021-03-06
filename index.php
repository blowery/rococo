<?php get_header(); ?>

<!-- html structure based on http://microformats.org/wiki/hatom -->
<div id="content" class="hfeed">
  
  <?php if(have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="post hentry">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="meta">
          <abbr class="published" title="<?php the_time('Y-m-d\TH:m:s\Z', true); ?>"><?php echo time_ago(); ?></abbr>
          <div class="comments"><?php comments_popup_link("0 notes", "1 note", "% notes", "notes", ""); ?></div>
        </div>
        <?php edit_post_link("Edit", '<div class="meta edit">', "</div>"); ?>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>

		<div class="navigation">
			<div class="backward"><?php next_posts_link('&laquo; Previously') ?></div>
			<div class="forward"><?php previous_posts_link('Subsequently &raquo;') ?></div>
    </div>
    <div class="clear-both"></div>
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

  <?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
