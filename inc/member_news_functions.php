<?php

// Register Members In The News Custom Taxonomy
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


// Register Tags Taxonomy
function member_tag_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Tags', 'Date General Name', 'text_domain' ),
    'singular_name'              => _x( 'Tag', 'Date Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Tag', 'text_domain' ),
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
  register_taxonomy( 'member_tag', array( 'member_news' ), $args );

}
add_action( 'init', 'member_tag_taxonomy', 0 );


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

    $taxonomies = array();
    if ($atts['term'] == 'view-all') {
      $taxonomies = array('member_date', 'sanctuary', 'member_tag');
    } else {
      $taxonomies = array($atts['term']);
    }

   
    $result = '<div id="container-async" class="sc-ajax-filter closest-container">
                <div class="content">
                  <div class="status"></div>
                </div>
                <section class="filter_sidebar">';
   
    foreach ($taxonomies as $t) {
         $a = shortcode_atts( array(
        'tax'      => $t, // Taxonomy
        'terms'    => false, // Get specific taxonomy terms only
        'active'   => false, // Set active term by ID
        'per_page' => 12 // How many posts per page
        ), $atts );

         $terms = get_terms($t);

         //print_r($terms);

         $taxonomy = get_taxonomy($t);
         //print_r($taxonomy);
         $labels = get_taxonomy_labels($taxonomy);
        //print_r($labels);
                
         $result.= '<h3>'.$labels->name.'</h3>'; 

         $result.= buildTaxonomyList($terms, $a);


    $terms  = get_terms($a['tax']);

    } 

    $result.='</section></div>';

    return $result;
}

function buildTaxonomyList($terms, $a) {
    if (empty($terms)) {
        return '';
    }
    $output = '<ul class="nav-filter">';


     
        foreach ($terms as $term) {
                
            $class = $term->term_id == $a['active'] ? 'class="active"':'';
            $link = get_term_link( $term, $term->taxonomy );
            
             $output.=  "<li {$class}>";
             $output.= "<a href='{$link}' data-filter='{$term->taxonomy}' data-term='{$term->slug}' data-page='1'>{$term->name}</a>";
             $output.= '</li>';     
              
        }

    return $output.'</ul>';  
    
}
add_shortcode( 'ajax_filter_posts', 'vb_filter_posts_sc');


?>
