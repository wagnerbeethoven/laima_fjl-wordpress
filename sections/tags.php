<section class="section-tags">
  <div class="container">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'tag-menu',
      'container' => false,
      'items_wrap' => '<nav class="container align-items-center d-flex justify-content-center">%3$s</nav>',
      'walker' => new WP_BootstrapTagwalker(),
      'link_before' => '<span itemprop="name">',
      'link_after' => '</span>',
    ));
    ?>
  </div>
</section>