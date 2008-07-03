</div>
<div id="sidebar">
  <ul>
    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
      Oh hell. No sidebar.
    <?php endif; ?>
  </ul>
<?php wp_meta(); ?>
    <div class="clear-both"></div>
</div>
