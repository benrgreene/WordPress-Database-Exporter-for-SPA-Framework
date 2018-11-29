<?php

/**
    Plugin Name: Export tool for SPA framework
    Plugin URI:
    Description: Add exporting for the SPA framework
    Author: Ben Greene
    Version: 1
    License: MIT
 */

include 'core/admin.php';

add_action( 'init', 'brg_spa_setup' );
function brg_spa_setup() {
  // setup the admin interface 
  new BRG_SPA_Admin_Interface_Controller();
  // check if we should download the export
  if( is_admin() && 
      current_user_can( 'edit_posts' ) && 
      isset( $_POST['export-spa-content'] ) ) {
    brg_spa_export();
  }
}


function brg_spa_export() {
  $export = array();
  // get the post types to download
  $post_types = apply_filters( 'brg/spa/post_types', array( 'post', 'page' ) );
  // get all our posts, then loop over then and add all our info for each
  $query = new WP_Query( array(
    'posts_per_page' => -1,
    'post_type'      => $post_types,
  ) );

  if( $query->have_posts() ) {
    while( $query->have_posts() ) { $query->the_post();
      $to_add = array(
        'post_info' => array(),
        'uploads'   => array(),
        'meta'      => array()
      );
      // Post info
      $to_add['post_info']['type']    = get_post_type();
      $to_add['post_info']['title']   = get_the_title();
      $to_add['post_info']['content'] = get_the_content();
      $to_add['post_info']['date']    = get_the_date();
      $to_add['post_info']['author']  = get_the_author();
      // uploads
      if( has_post_thumbnail() ) {
        $thumb_id = get_post_thumbnail_id();
        $deets    = wp_get_attachment_metadata( $thumb_id );
        $to_add['uploads']['file'] = $deets['file'];
      }
      $export[] = $to_add;
    }
    wp_reset_postdata();
  }

  // Download the file
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary");
  header('Content-disposition: attachment; filename="spa-export.json"');
  flush();
  echo json_encode( $export );
  exit();
}