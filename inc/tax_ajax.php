<?php

function vb_filter_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'napsa' ) ) {
        die('Permission denied');
    }

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
        'post_type'      => $_POST['params']['post-type'],
        'post_status'    => 'publish',
        'posts_per_page' => $qty,
        'tax_query'      => $tax_qry
    ];

    $qry = new WP_Query($args);


    ob_start();
        if ($qry->have_posts()) :
            while ($qry->have_posts()) : $qry->the_post(); ?>

			<?php
        		if ( get_post_type( get_the_ID() ) == 'member_news' ) { ?>
				    
<<<<<<< HEAD
        		<?php 
=======
        			<?php 
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
                   $postID = get_the_ID(); 
                   $fields = get_fields($postID);
                   $op_url = $fields["original_publication_url"];
                   $op = $fields["original_publication"];
<<<<<<< HEAD
                   $hd_post_type = "member_news";
                ?>

                <article class="loop-item">
                    <h3> <?php the_title(); ?></h3>
                    <strong><?php echo get_the_date('m/d/Y'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=$op;?></strong>
                    <?php the_content(); ?>
                    <a href="<?=$op_url;?>" target="_blank">Read More</a>
                </article>

				<?php }
			?>


			<?php
        		if ( get_post_type( get_the_ID() ) == 'napsa_news' ) { ?>
				    
        		<?php 
                   $postID = get_the_ID(); 
                   $fields = get_fields($postID);
                   $op_url = $fields["original_publication_url"];
                   $op = $fields["original_publication"];
                   $hd_post_type = "napsa_news";
                ?>
                <article class="loop-item">
                    <h3> <?php the_title(); ?></h3>
                    <strong><?php echo get_the_date('m/d/Y'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=$op;?></strong>
                    <?php the_content(); ?>
                    <?php if (!empty($op_url)) { ?>
                    <a href="<?=$op_url;?>" target="_blank">Read More</a>
                    <?php } ?>
                </article>

				<?php }
			?>

			<?php
        		if ( get_post_type( get_the_ID() ) == 'napsa_responds' ) { ?>
				    
        		<?php 
                   $postID = get_the_ID(); 
                   $fields = get_fields($postID);
                   $file_url = $fields["file_upload"];
                   $file_url_2 = $fields["file_upload_2"];
                   $hd_post_type = "napsa_responds";
                ?>
                <article class="loop-item">
                    <h3> <?php the_title(); ?></h3>
                    <strong><?php echo get_the_date('m/d/Y'); ?></strong>
                    <?php the_content(); ?>
                    <a href="<?=$file_url;?>" target="_blank">Read Our Letter</a>
                    <?php if (!empty($file_url_2)) { ?>
                      <br /><a href="<?=$file_url_2;?>" target="_blank">Read Our Letter</a>
                    <?php } ?>
                </article>

				<?php }
=======
                ?>
               
                <?=$op_url;?>

                <?=$op;?>
                <article class="loop-item">
                    <span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><strong>&nbsp;<?php echo get_the_date('m/d/Y'); ?>:&nbsp;</strong></span>
                    <?php the_excerpt(); ?>
                </article>



			<?php }
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5
			?>



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
      $taxonomies = explode(',', $atts['taxonomies']);
    } else {
      $taxonomies = array($atts['term']);
    }

   
    $result = '<div id="container-async" class="sc-ajax-filter closest-container">
                <div class="content">
                  <div class="status"></div>
                </div>
                <section class="filter_sidebar"> 
<<<<<<< HEAD
                <div class="napsa_sidebar">Loading Content... </div>';
=======
                <div class="napsa_sidebar">Blah </div>';
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5

    foreach ($taxonomies as $t) {

         $a = shortcode_atts( array(
        'tax'      => $t, // Taxonomy
        'terms'    => false, // Get specific taxonomy terms only
        'active'   => false, // Set active term by ID
        'per_page' => 12 // How many posts per page
        ), $atts );


         $terms  = get_terms($a['tax']);
         $taxonomy = get_taxonomy($t);
         $labels = get_taxonomy_labels($taxonomy);
         $result.= '<h3>'.$labels->name.'</h3>'; 
         $result.= buildTaxonomyList($terms, $a);
    } 

<<<<<<< HEAD
    $result.='<div class="view_btn_contain"></div></section></div>';
=======
    $result.='</section></div>';
>>>>>>> 2fcf449e157fb3af779331163f5382f484779ec5

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