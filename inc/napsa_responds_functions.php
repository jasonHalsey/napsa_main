<?php

// Register Members In The News Custom Taxonomy
function responds_category_taxonomy() {

  $labels = array(
<<<<<<< HEAD
    'name'                       => _x( 'SORT BY SUBJECT', 'Sanctuary General Name', 'text_domain' ),
=======
    'name'                       => _x( 'Category', 'Sanctuary General Name', 'text_domain' ),
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
    'singular_name'              => _x( 'Category', 'Sanctuary Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Category', 'text_domain' ),
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
  register_taxonomy( 'responds_category', array( 'napsa_responds' ), $args );

}
add_action( 'init', 'responds_category_taxonomy', 0 );

// Register Custom Taxonomy
function responds_date_taxonomy() {

  $labels = array(
<<<<<<< HEAD
    'name'                       => _x( 'ARCHIVE BY YEAR', 'Date General Name', 'text_domain' ),
=======
    'name'                       => _x( 'Published Date', 'Date General Name', 'text_domain' ),
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
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
  register_taxonomy( 'responds_date', array( 'napsa_responds' ), $args );

}
add_action( 'init', 'responds_date_taxonomy', 0 );


// Register Tags Taxonomy
function responds_tag_taxonomy() {

  $labels = array(
<<<<<<< HEAD
    'name'                       => _x( 'TAGS', 'Date General Name', 'text_domain' ),
=======
    'name'                       => _x( 'Tags', 'Date General Name', 'text_domain' ),
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
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
  register_taxonomy( 'responds_tag', array( 'napsa_responds' ), $args );

}
add_action( 'init', 'responds_tag_taxonomy', 0 );





?>
