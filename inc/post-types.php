<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Position', 'post type general name'),
    'singular_name' => _x('Position', 'post type singular name'),
    'add_new' => _x('Add New', 'Position'),
    'add_new_item' => __('Add New Position'),
    'edit_item' => __('Edit Position'),
    'new_item' => __('New Position'),
    'view_item' => __('View Position'),
    'search_items' => __('Search Position'),
    'not_found' =>  __('No Position found'),
    'not_found_in_trash' => __('No Position found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Positions'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail', 'excerpt'),
	
  ); 
  register_post_type('position',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type



/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
  register_taxonomy( 'status', 'position',
     array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Status', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'status' ),
      '_builtin' => true
    ) );
   register_taxonomy( 'focus_area', 'position',
     array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Focus Area', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'focus-area' ),
      '_builtin' => true
    ) );
   
  
} // End build taxonomies
