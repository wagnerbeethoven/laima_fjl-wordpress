<?php
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu
{

  // Começo de cada item de lista
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '<ul class="navbar-nav">'; // Adiciona a classe 'navbar-nav' no início de cada sub-menu
  }

  // Final de cada item de lista
  function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</ul>'; // Fecha a tag do <ul>
  }

  // Começo de cada item
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'nav-item'; // Adiciona a classe 'nav-item'

    // Se o item for o ativo, adiciona a classe 'active'
    if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
    }

    // Garante que as classes serão aplicadas corretamente
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    // Começo do link
    $output .= '<li' . $class_names . '>';
    $atts = array();
    $atts['class'] = 'nav-link'; // Adiciona a classe 'nav-link' ao <a>

    // Adiciona o link do item
    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
      }
    }

    $title = apply_filters('the_title', $item->title, $item->ID);
    $url = !empty($item->url) ? $item->url : '#';

    // Verificando se $args é um objeto ou array
    $item_output = isset($args->before) ? $args->before : '';
    $item_output .= '<a' . $attributes . ' href="' . esc_url($url) . '">';
    $item_output .= isset($args->link_before) ? $args->link_before : '';
    $item_output .= '<span itemprop="name">' . $title . '</span>';
    $item_output .= isset($args->link_after) ? $args->link_after : '';
    $item_output .= '</a>';
    $item_output .= isset($args->after) ? $args->after : '';

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  // Final do item de lista
  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= '</li>'; // Fecha o <li>
  }
}

class WP_BootstrapSocialwalker extends Walker_Nav_Menu
{

  // Começo de cada item de lista
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '<ul class="navbar-nav">'; // Adiciona a classe 'navbar-nav' no início de cada sub-menu
  }

  // Final de cada item de lista
  function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</ul>'; // Fecha a tag do <ul>
  }

  // Começo de cada item
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'nav-item'; // Adiciona a classe 'nav-item'

    // Se o item for o ativo, adiciona a classe 'active'
    if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
    }

    // Garante que as classes serão aplicadas corretamente
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    // Começo do link
    $output .= '<li>';
    $atts = array();
    $atts['class'] = 'nav-link'; // Adiciona a classe 'nav-link' ao <a>

    // Adiciona o link do item
    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
      }
    }

    $title = apply_filters('the_title', $item->title, $item->ID);
    $url = !empty($item->url) ? $item->url : '#';

    // Verificando se $args é um objeto ou array
    $item_output = isset($args->before) ? $args->before : '';
    $item_output .= '<a' . $attributes . ' href="' . esc_url($url) . '">';
    $item_output .= isset($args->link_before) ? $args->link_before : '';
    $item_output .= '<i' . $class_names . ' title="' . $title . '"></i>';
    $item_output .= isset($args->link_after) ? $args->link_after : '';
    $item_output .= '</a>';
    $item_output .= isset($args->after) ? $args->after : '';

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  // Final do item de lista
  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= '</li>'; // Fecha o <li>
  }
}

class WP_BootstrapTagwalker extends Walker_Nav_Menu
{

  // Começo de cada item de lista
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= ''; // <ul class="container">Adiciona a classe 'navbar-nav' no início de cada sub-menu
  }

  // Final de cada item de lista
  function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= ''; // </ul>Fecha a tag do <ul>
  }

  // Começo de cada item
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'nav-item'; // Adiciona a classe 'nav-item'

    // Se o item for o ativo, adiciona a classe 'active'
    if (in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
    }

    // Garante que as classes serão aplicadas corretamente
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    // Começo do link
    $output .= ''; // <li>
    $atts = array();
    $atts['class'] = 'p-2 m-5 d-block'; // nav-linkAdiciona a classe 'nav-link' ao <a>

    // Adiciona o link do item
    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
      }
    }

    $title = apply_filters('the_title', $item->title, $item->ID);
    $url = !empty($item->url) ? $item->url : '#';

    // Verificando se $args é um objeto ou array
    $item_output = isset($args->before) ? $args->before : '';
    $item_output .= '<a' . $attributes . ' class="p-2 m-5 d" href="' . esc_url($url) . '">';
    $item_output .= isset($args->link_before) ? $args->link_before : '';
    $item_output .= '<i' . $class_names . ' title="' . $title . '"></i>';
    $item_output .= '<span class="d-block mt-3">' . $title . '</span>';
    ;
    $item_output .= isset($args->link_after) ? $args->link_after : '';
    $item_output .= '</a>';
    $item_output .= isset($args->after) ? $args->after : '';

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  // Final do item de lista
  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= ''; // </li>Fecha o <li>
  }
}
class WP_BootstrapProjetoswalker extends Walker_Nav_Menu {

  // Não precisamos de estrutura de <ul> ou <li> para esse layout
  function start_lvl(&$output, $depth = 0, $args = null) {
      // Não usamos submenus nesta estrutura, portanto não há output aqui
  }

  function end_lvl(&$output, $depth = 0, $args = null) {
      // Não há fechamento de submenus
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
      // Recupera os dados do item do menu
      $icon_class  = !empty($item->attr_title) ? $item->attr_title : 'fa-solid fa-flask-vial';
      $title       = $item->title;
      $url         = !empty($item->url) ? $item->url : '#';
      $description = $item->description; // Pode conter os parágrafos que você desejar

      // Inicia a estrutura do card
      $output .= '<div class="col-12 col-md">';
        $output .= '<div class="card invensoes">';
          $output .= '<div class="card-body">';
            $output .= '<i class="' . esc_attr($icon_class) . '"></i>';
            $output .= '<div class="card-content">';
              $output .= '<h3 class="card-title">' . esc_html($title) . '</h3>';
              $output .= '<div class="card-text">';
                // Se houver descrição, exibe-a (usamos wpautop para criar parágrafos automaticamente)
                if ( ! empty( $description ) ) {
                    $output .= wpautop( $description );
                }
                // Link fixo; você pode personalizá-lo conforme necessário
                $output .= '<a href="' . esc_url($url) . '" class="card-link">Confira as pesquisas</a>';
              $output .= '</div>'; // .card-text
            $output .= '</div>'; // .card-content
          $output .= '</div>'; // .card-body
        $output .= '</div>'; // .card invensoes
      $output .= '</div>'; // .col-12 col-md
  }

  function end_el(&$output, $item, $depth = 0, $args = null) {
      // Tudo já foi fechado em start_el
  }
}



?>