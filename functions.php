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
    'taxonomies' => array('category', 'post_tag'),
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



// Register Custom Taxonomy
function sanctuaries_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Member Sanctuary', 'Sanctuary General Name', 'text_domain' ),
    'singular_name'              => _x( 'Sanctuary', 'Sanctuary Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Sanctuary', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Item', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
    'new_item_name'              => __( 'New Item Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Item', 'text_domain' ),
    'edit_item'                  => __( 'Edit Item', 'text_domain' ),
    'update_item'                => __( 'Update Item', 'text_domain' ),
    'view_item'                  => __( 'View Item', 'text_domain' ),
    'separate_items_with_commas' => __( ' ', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'sanctuary', array( 'member_news' ), $args );

}
add_action( 'init', 'sanctuaries_taxonomy', 0 );

// Register Custom Taxonomy
function member_date_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Published Date', 'Date General Name', 'text_domain' ),
    'singular_name'              => _x( 'Published Date', 'Date Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Published Date', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Item', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
    'new_item_name'              => __( 'New Item Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Item', 'text_domain' ),
    'edit_item'                  => __( 'Edit Item', 'text_domain' ),
    'update_item'                => __( 'Update Item', 'text_domain' ),
    'view_item'                  => __( 'View Item', 'text_domain' ),
    'separate_items_with_commas' => __( ' ', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'member_date', array( 'member_news' ), $args );

}
add_action( 'init', 'member_date_taxonomy', 0 );



function vb_filter_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'napsa' ) )
        die('Permission denied');

    /**
     * Default response
     */
    $response = [
        'status'  => 500,
        'message' => 'Something is wrong, please try again later ...',
        'content' => false,
        'found'   => 0
    ];

    $tax  = sanitize_text_field($_POST['params']['tax']);
    $term = sanitize_text_field($_POST['params']['term']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);

    /**
     * Check if term exists
     */
    if (!term_exists( $term, $tax) && $term != 'all-terms') :
        $response = [
            'status'  => 501,
            'message' => 'Term doesn\'t exist',
            'content' => 0
        ];

        die(json_encode($response));
    endif;

    if ($term == 'all-terms') : 

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
            'operator' => 'NOT IN'
        ];

    else :

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
        ];

    endif;

    /**
     * Setup query
     */
    $args = [
        'paged'          => $page,
        'post_type'      => 'member_news',
        'post_status'    => 'publish',
        'posts_per_page' => $qty,
        'tax_query'      => $tax_qry
    ];

    $qry = new WP_Query($args);


    ob_start();
        if ($qry->have_posts()) :
            while ($qry->have_posts()) : $qry->the_post(); ?>

                <article class="loop-item">
                    <span> <strong><?php echo get_the_date('d/m/Y'); ?>:&nbsp;</strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </article>

            <?php endwhile;

            /**
             * Pagination
             */
            vb_ajax_pager($qry,$page);

            $response = [
                'status'=> 200,
                'found' => $qry->found_posts
            ];

            
        else :

            $response = [
                'status'  => 201,
                'message' => 'No posts found'
            ];

        endif;

    $response['content'] = ob_get_clean();

    die(json_encode($response));

}
add_action('wp_ajax_do_filter_posts', 'vb_filter_posts');
add_action('wp_ajax_nopriv_do_filter_posts', 'vb_filter_posts');


/**
 * Shortocde for displaying terms filter and results on page
 */
function vb_filter_posts_sc($atts) {

    $a = shortcode_atts( array(
        'tax'      => 'member_date', // Taxonomy
        'terms'    => false, // Get specific taxonomy terms only
        'active'   => false, // Set active term by ID
        'per_page' => 12 // How many posts per page
    ), $atts );

    $result = NULL;
    $terms  = get_terms($a['tax']);

    if (count($terms)) :
        ob_start(); ?>
            <div id="container-async" class="sc-ajax-filter closest-container’">
                <div class="content">
                  <div class="status"></div>
                </div>
                <section class="filter_sidebar">
                  <ul class="nav-filter">
                      <?php foreach ($terms as $term) : ?>
                          <li<?php if ($term->term_id == $a['active']) :?> class="active"<?php endif; ?>>
                              <a href="<?php echo get_term_link( $term, $term->taxonomy ); ?>" data-filter="<?php echo $term->taxonomy; ?>" data-term="<?php echo $term->slug; ?>" data-page="1">
                                  <?php echo $term->name; ?>
                              </a>
                          </li>
                      <?php endforeach; ?>
                  </ul>
                </section>
                
                
            </div>
        
        <?php $result = ob_get_clean();
    endif;

    return $result;
}
add_shortcode( 'ajax_filter_posts', 'vb_filter_posts_sc');



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