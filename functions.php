<?php
add_action('after_setup_theme', 'fjl_setup');
function fjl_setup()
{
  load_theme_textdomain('fjl', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('responsive-embeds');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form', 'navigation-widgets'));
  add_theme_support('appearance-tools');
  add_theme_support('woocommerce');
  global $content_width;
  if (!isset($content_width)) {
    $content_width = 1920;
  }
  register_nav_menus(array('main-menu' => esc_html__('Principal', 'fjl')));
  register_nav_menus(array('social-menu' => esc_html__('Social', 'fjl')));
  register_nav_menus(array('tag-menu' => esc_html__('Assuntos', 'fjl')));
  register_nav_menus(array('projetos-menu' => esc_html__('Projetos', 'fjl')));
}
add_action('admin_notices', 'fjl_notice');
function fjl_notice()
{
  $user_id = get_current_user_id();
  $admin_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $param = (count($_GET)) ? '&' : '?';
  if (!get_user_meta($user_id, 'fjl_notice_dismissed_11') && current_user_can('manage_options'))
    echo '<div class="notice notice-info"><p><a href="' . esc_url($admin_url), esc_html($param) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__('Ⓧ', 'fjl') . '</big></a>' . wp_kses_post(__('<big><strong>🏆 Thank you for using fjl!</strong></big>', 'fjl')) . '<p>' . esc_html__('Powering over 10k websites! Buy me a sandwich! 🥪', 'fjl') . '</p><a href="https://github.com/bhadaway/fjl/issues/57" class="button-primary" target="_blank"><strong>' . esc_html__('How do you use fjl?', 'fjl') . '</strong></a> <a href="https://opencollective.com/fjl" class="button-primary" style="background-color:green;border-color:green" target="_blank"><strong>' . esc_html__('Donate', 'fjl') . '</strong></a> <a href="https://wordpress.org/support/theme/fjl/reviews/#new-post" class="button-primary" style="background-color:purple;border-color:purple" target="_blank"><strong>' . esc_html__('Review', 'fjl') . '</strong></a> <a href="https://github.com/bhadaway/fjl/issues" class="button-primary" style="background-color:orange;border-color:orange" target="_blank"><strong>' . esc_html__('Support', 'fjl') . '</strong></a></p></div>';
}
add_action('admin_init', 'fjl_notice_dismissed');
function fjl_notice_dismissed()
{
  $user_id = get_current_user_id();
  if (isset($_GET['dismiss']))
    add_user_meta($user_id, 'fjl_notice_dismissed_11', 'true', true);
}
add_action('wp_enqueue_scripts', 'fjl_enqueue');
function fjl_enqueue()
{
  wp_enqueue_style('fjl-style', get_stylesheet_uri());
  wp_enqueue_script('jquery');
}
add_action('wp_footer', 'fjl_footer');
function fjl_footer()
{
  ?>
  <script>
    jQuery(document).ready(function ($) {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
        $("html").addClass("mobile");
      }
      if (deviceAgent.match(/(Android)/)) {
        $("html").addClass("android");
        $("html").addClass("mobile");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
      }
      else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
      }
      else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
      }
      else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
      }
      else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
      }
    });
  </script>
  <?php
}
add_filter('document_title_separator', 'fjl_document_title_separator');
function fjl_document_title_separator($sep)
{
  $sep = esc_html('|');
  return $sep;
}
add_filter('the_title', 'fjl_title');
function fjl_title($title)
{
  if ($title == '') {
    return esc_html('...');
  } else {
    return wp_kses_post($title);
  }
}
function fjl_schema_type()
{
  $schema = 'https://schema.org/';
  if (is_single()) {
    $type = "Article";
  } elseif (is_author()) {
    $type = 'ProfilePage';
  } elseif (is_search()) {
    $type = 'SearchResultsPage';
  } else {
    $type = 'WebPage';
  }
  echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}
add_filter('nav_menu_link_attributes', 'fjl_schema_url', 10);
function fjl_schema_url($atts)
{
  $atts['itemprop'] = 'url';
  return $atts;
}
if (!function_exists('fjl_wp_body_open')) {
  function fjl_wp_body_open()
  {
    do_action('wp_body_open');
  }
}
add_action('wp_body_open', 'fjl_skip_link', 5);
function fjl_skip_link()
{
  echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'fjl') . '</a>';
}
add_filter('the_content_more_link', 'fjl_read_more_link');
function fjl_read_more_link()
{
  if (!is_admin()) {
    return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'fjl'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}
add_filter('excerpt_more', 'fjl_excerpt_read_more_link');
function fjl_excerpt_read_more_link($more)
{
  if (!is_admin()) {
    global $post;
    return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'fjl'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}
add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'fjl_image_insert_override');
function fjl_image_insert_override($sizes)
{
  unset($sizes['medium_large']);
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}
add_action('widgets_init', 'fjl_widgets_init');
function fjl_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Sidebar Widget Area', 'fjl'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}
add_action('wp_head', 'fjl_pingback_header');
function fjl_pingback_header()
{
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
  }
}
add_action('comment_form_before', 'fjl_enqueue_comment_reply_script');
function fjl_enqueue_comment_reply_script()
{
  if (get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
function fjl_custom_pings($comment)
{
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?>
  </li>
  <?php
}
add_filter('get_comments_number', 'fjl_comment_count', 0);
function fjl_comment_count($count)
{
  if (!is_admin()) {
    global $id;
    $get_comments = get_comments('status=approve&post_id=' . $id);
    $comments_by_type = separate_comments($get_comments);
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}
;

// Inclui o arquivo navwalker.php
require_once get_template_directory() . '/navwalker.php';