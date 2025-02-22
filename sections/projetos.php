<section class="projetos">
  <div class="container">
    <header>
      <h2 class="heading">Projetos</h2>
      <div class="subheading">Todos os projetos voltados à melhoria da acessibilidade em diferentes áreas, como
        educação e tecnologia assistiva.</div>
    </header>
    <div class="my-5"></div>
    <section class="section-projetos">
      <div class="container">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'projetos-menu',
          'container'      => 'div',
          'container_class'=> 'row', // por exemplo, para criar uma grid
          'items_wrap' => '%3$s',
          'walker' => new WP_BootstrapTagwalker(),
        ));
        ?>
      </div>
    </section>


  </div>
</section>