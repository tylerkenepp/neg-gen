<?php
  function cptui_register_my_cpts_spell() {

  	/**
  	 * Post Type: Spells.
  	 */

  	$labels = array(
  		"name" => __( "Spells", "" ),
  		"singular_name" => __( "Spell", "" ),
  	);

  	$args = array(
  		"label" => __( "Spells", "" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => true,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "spell", "with_front" => true ),
  		"query_var" => true,
  		"menu_position" => 6,
  		"menu_icon" => "http://local.nexgen.com/wp-content/uploads/2017/09/magic-spell-fire-20.png",
  		"supports" => array( "title", "editor" ),
  	);

  	register_post_type( "spell", $args );
  }

  add_action( 'init', 'cptui_register_my_cpts_spell' );
