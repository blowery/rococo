<?php get_header(); ?>

<!-- html structure based on http://microformats.org/wiki/hatom -->
<div id="content" class="hfeed">
  
  <?php if(have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="post hentry">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="meta">
          In <?php the_category(",") ?> on <abbr class="published" 
                              title="<?php the_time('c'); ?>"><?php the_time('M j Y'); ?></abbr>.
          <?php comments_popup_link("No comments.", "1 comment.", "% comments.", "comments", "Sorry, comments are closed."); ?>
        <?php edit_post_link("Edit", '<span class="edit">', "</span>"); ?>
        </div>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>

      <div class="navigation">
        <div class="backward"><?php previous_post_link('&laquo; %link') ?></div>
        <div class="forward"><?php next_post_link('%link &raquo;') ?></div>
      </div>
      <div class="clear-both"></div>
      <?php comments_template(); ?>

    <?php endwhile; else: ?>
      <p class="no-posts">Hrm, nothing matched that.</p>
  <?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

