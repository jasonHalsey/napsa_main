<?php

/*  Remove Admin Bar
/* ------------------------------------ */ 
	add_filter('show_admin_bar', '__return_false');


/*  Add Child-Theme Capabilities
/* ------------------------------------ */ 
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*  Add Custom JS
/* ------------------------------------ */ 
function wpb_adding_scripts() {

  $vars = "value";

  wp_register_script('app', get_stylesheet_directory_uri() . '/js/napsa_custom.js');

  wp_register_script('post_filter', get_stylesheet_directory_uri() . '/js/post_filter.js');

  wp_enqueue_style( 'style', get_stylesheet_uri() );

  wp_enqueue_script('app');

  wp_enqueue_script('post_filter');

  wp_localize_script( 'post_filter', 'napsa', array(
        'nonce'    => wp_create_nonce( 'napsa' ),
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));

  }
  add_action( 'wp_footer', 'wpb_adding_scripts' );



/*  Add Custom Footers
/* ------------------------------------ */ 
function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'SideBar', 'your-theme-domain' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

function aboutfooter_widgets_init() {

  register_sidebar( array(
    'name'          => 'About Section Footer',
    'id'            => 'about_footer',
    'before_widget' => '<div class="aboutfooter-content">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="aboutfooter-title">',
    'after_title' => '</h3>',
  ) );

}
add_action( 'widgets_init', 'aboutfooter_widgets_init' );

function infofooter_widgets_init() {

  register_sidebar( array(
    'name'          => 'Info Section Footer',
    'id'            => 'info_footer',
    'before_widget' => '<div class="infofooter-content">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="infotfooter-title">',
    'after_title' => '</h3>',
  ) );

}
add_action( 'widgets_init', 'infofooter_widgets_init' );

function member_sanc_widgets_init() {

  register_sidebar( array(
    'name'          => 'Member Sanc Section',
    'id'            => 'member_list',
    'before_widget' => '<div class="member_sanc-content">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="member_sanc-title">',
    'after_title' => '</h3>',
  ) );

}
add_action( 'widgets_init', 'member_sanc_widgets_init' );




/* Custom Post Types ------------------------------------ */ 

// ----------------- Creates NAPSA NEWS Post Type
add_action('init', 'post_type_napsa_news');
function post_type_napsa_news() 
{
  $labels = array(
    'name' => _x('NAPSA In The News', 'post type general name'),
    'singular_name' => _x('Napsa News', 'post type singular name'),
    'add_new' => _x('Add New NAPSA News Post', 'napsa_news'),
    'add_new_item' => __('Add New NAPSA News Post')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'napsa_news' ),
    'capability_type' => 'post',
    'taxonomies' => array('category', 'post_tag'),
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','excerpt', 'editor', 'thumbnail')
    ); 
  register_post_type('napsa_news',$args);
  flush_rewrite_rules();
}; 


// ----------------- Creates NAPSA Member Post Type
add_action('init', 'post_type_member_news');
function post_type_member_news() 
{
  $labels = array(
    'name' => _x('Members In The News', 'post type general name'),
    'singular_name' => _x('Member News', 'post type singular name'),
    'add_new' => _x('Add New Member News Post', 'member_news'),
    'add_new_item' => __('Add New Member News Post')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'member_news' ),
    'capability_type' => 'post',
    // 'taxonomies' => array('category', 'post_tag'),
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','excerpt', 'editor', 'thumbnail')
    ); 
  register_post_type('member_news',$args);
  flush_rewrite_rules();
}; 


// ----------------- Creates NAPSA Responds Post Type
add_action('init', 'post_type_napsa_responds');
function post_type_napsa_responds() 
{
  $labels = array(
    'name' => _x('NAPSA Responds', 'post type general name'),
    'singular_name' => _x('Napsa Responds', 'post type singular name'),
    'add_new' => _x('Add New NAPSA Responds Post', 'napsa_responds'),
    'add_new_item' => __('Add New NAPSA Responds Post')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'napsa_responds' ),
    'capability_type' => 'post',
    // 'taxonomies'          => array( 'category' ),
    'taxonomies' => array('category', 'post_tag'),
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','excerpt', 'editor', 'thumbnail')
    ); 
  register_post_type('napsa_responds',$args);
  flush_rewrite_rules();
}; 

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category NAPSA
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

require_once 'cmb/init.php';

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
  // Don't show this field if not in the cats category
  if ( ! has_tag( 'cats', $field->object_id ) ) {
    return false;
  }
  return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_lmc_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_lmc_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_cmb2_';



  /**
   * NAPSA Responds Metabox Layout
   */
  $meta_boxes['respond_metabox'] = array(
    'id'            => 'respond_metabox',
    'title'         => __( 'NAPSA Responds', 'cmb2' ),
    'object_types'  => array( 'napsa_responds' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    'fields'        => array(
      
      array(
        'name'    => __( 'Original Publish Date', 'cmb2' ),
        'id'      => $prefix . 'pub_date',
        'type' => 'text_date',
      ),
    )
  );

   /**
   * NAPSA In The News Metabox Layout
   */
  $meta_boxes['news_metabox'] = array(
    'id'            => 'news_metabox',
    'title'         => __( 'NAPSA In The News', 'cmb2' ),
    'object_types'  => array( 'napsa_news' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    'fields'        => array(
      
      array(
        'name'    => __( 'Original Publish Date', 'cmb2' ),
        'id'      => $prefix . 'pub_date',
        'type' => 'text_date',
      ),
      array(
        'name'    => __( 'Original Author', 'cmb2' ),
        'id'      => $prefix . 'news_author',
        'type' => 'text_medium',
      ),   
    )
  );

  /**
   * NAPSA Members In The News Metabox Layout
   */
  $meta_boxes['member_news_metabox'] = array(
    'id'            => 'member_news_metabox',
    'title'         => __( 'NAPSA In The News', 'cmb2' ),
    'object_types'  => array( 'member_news' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    'fields'        => array(
      
      array(
        'name'    => __( 'Original Publish Date', 'cmb2' ),
        'id'      => $prefix . 'member_pub_date',
        'type' => 'text_date',
      ),
      array(
        'name'    => __( 'Original Publication', 'cmb2' ),
        'id'      => $prefix . 'member_news_publication',
        'type' => 'text_medium',
      ),   
    )
  );

  return $meta_boxes;
}



require_once( __DIR__ . '/inc/member_news_functions.php'); 


/**
 * Pagination
 */
function vb_ajax_pager( $query = null, $paged = 1 ) {

    if (!$query)
        return;

    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_text' => 'Prev',
        'next_text' => 'Next'
    ]);

    if ($query->max_num_pages > 1) : ?>
        <ul class="pagination">
            <?php foreach ( $paginate as $page ) :?>
                <li><?php echo $page; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif;
}









?>