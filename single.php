<?php get_header(); ?>

<!-- html structure based on http://microformats.org/wiki/hatom -->
<div id="content" class="hfeed">
  
  <?php if(have_posts()) : ?>
<div class="g_Ad">
<script type="text/javascript"><!--
google_ad_client = "pub-8971193464927560";
/* 728x90, created 4/23/08 */
google_ad_slot = "8510043230";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

    <?php while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" class="post hentry">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="meta">
          <abbr class="published" title="<?php the_time('D, d M Y H:m:s -0000', true); ?>"><?php the_time("M j Y"); ?></abbr>
          <div class="comments"><?php comments_popup_link("0 notes", "1 note", "% notes", "notes", ""); ?></div>
        </div>
        <?php edit_post_link("Edit", '<div class="meta edit">', "</div>"); ?>
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

