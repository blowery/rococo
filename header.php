<?php if ( is_singular() ) wp_enqueue_script('comment-reply');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="verify-v1" content="r2OkUNJ/fDwnW60bNxWmUm0oeZERjWeK54rgTMdYMLg=" />
    <meta name="readability-verification" content="vY3u8LvtvcGXCQ88L8V5p3KxpY7qDemABx7cmpVe"/>
    <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link  href="http://fonts.googleapis.com/css?family=Tangerine:regular,bold" rel="stylesheet" type="text/css" >
<link  href="http://fonts.googleapis.com/css?family=Permanent+Marker:regular" rel="stylesheet" type="text/css" >    
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="http://feeds.blowery.org/blowery" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body class="tundra">
    <div id="page">
      <h1 id="title">
        <a href="<?php bloginfo('url'); ?>" title="Take me home">b<span class="leftout">en</span>lowery</a>
      </h1>
