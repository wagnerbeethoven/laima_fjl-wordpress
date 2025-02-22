<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php fjl_schema_type(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
</head>

<body <?php body_class('py-4'); ?>>
  <?php wp_body_open(); ?>


  <header class="hfeed" id="header" role="banner">
    <nav class="navbar navbar-expand-md border-body" aria-label="menu">
      <div class="container">
        <div id="branding" class="navbar-brand">
          <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?> &mdash; <?php bloginfo('description'); ?>" rel="home"
              itemprop="url">
              <span itemprop="name" class="visually-hidden">
                <?php bloginfo('name'); ?>
              </span>
              <img style="width: 355px;" class="d-block img-fluid"
                src="<?php echo esc_url(get_theme_file_uri('img/logo.svg')); ?>" alt="">
            </a>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
          aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div>
          <div class="collapse navbar-collapse" id="menu" id="menu" role="navigation" itemscope
            itemtype="https://schema.org/SiteNavigationElement">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false,
              'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
              'walker' => new WP_Bootstrap_Navwalker(),
              'link_before' => '<span itemprop="name">',
              'link_after' => '</span>',
            ));
            ?>
            <?php
            wp_nav_menu(array(
              'theme_location' => 'social-menu',
              'container' => false,
              'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
              'walker' => new WP_BootstrapSocialwalker(),
              'link_before' => '<span itemprop="name">',
              'link_after' => '</span>',
            ));
            ?>
            <button type="button" class="ms-3 btn rounded-circle  btn-sm" style="width: 48px; height: 48px"
              data-bs-toggle="modal" data-bs-target="#pesquisa">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>

          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="pesquisa" tabindex="-1" aria-labelledby="pesquisaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body">
          <?php get_search_form(); ?>
        </div>

      </div>
    </div>
  </div>


  <div id="container">
    <main id="content" role="main">