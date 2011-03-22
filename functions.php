<?php
if(function_exists('register_sidebar'))
  register_sidebar();


function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  $from = $d('U');
  $to = current_time('timestamp');
  $diff = (int) abs($to - $from);
  if($diff < 1209600) {
    return human_time_diff($from, $to) . " " . __('ago');
  } else {
    return $d('Y M jS');
  }
}
