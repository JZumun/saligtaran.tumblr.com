<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="head">
    <a href="/" id="title-head">
        <h1 id="title" class="header-title"><?php bloginfo('name') ?></h1>
    </a>
    <p class="header-description"><?php bloginfo('description') ?></p>
    <nav class="header-nav">
      <a class="nav-link" href="/">Home</a>
      <?php 
        $pages = get_pages(); 
        foreach ( $pages as $page ) { ?>
      <a class="nav-link" href="<?php echo get_page_link( $page->ID ) ?>">
          <?php echo $page->post_title ?>
      </a>
      <?php } ?>
      <?php get_search_form(); ?>
    </nav>
  </header>