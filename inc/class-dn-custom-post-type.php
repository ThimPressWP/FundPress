<?php

/**
 * register all post type
 */
class DN_Post_Type
{

	public function __construct()
	{
		/**
		 * register post type
		 */
		add_action( 'init', array( $this, 'register_post_type_campaign' ) ); // campaign
		add_action( 'init', array( $this, 'register_post_type_donate' ) ); // donate
		add_action( 'init', array( $this, 'register_post_type_donor' ) ); // donor

		/**
		 * register taxonomy
		 */
		add_action( 'init', array( $this, 'register_taxonomy_causes' ) );
	}

	// register post type cause hook callback
	public function register_post_type_campaign()
	{
		$labels = array(
			'name'               => _x( 'Campaigns', 'Campaigns', 'tp-donate' ),
			'singular_name'      => _x( 'Campaign', 'Campaign', 'tp-donate' ),
			'menu_name'          => _x( 'Campaigns', 'admin menu', 'tp-donate' ),
			'name_admin_bar'     => _x( 'Campaign', 'add new on admin bar', 'tp-donate' ),
			'add_new'            => _x( 'Add Campaign', 'donate', 'tp-donate' ),
			'add_new_item'       => __( 'Add New Campaign', 'tp-donate' ),
			'new_item'           => __( 'New Campaign', 'tp-donate' ),
			'edit_item'          => __( 'Edit Campaign', 'tp-donate' ),
			'view_item'          => __( 'View Campaign', 'tp-donate' ),
			'all_items'          => __( 'Campaigns', 'tp-donate' ),
			'search_items'       => __( 'Search Campaigns', 'tp-donate' ),
			'parent_item_colon'  => __( 'Parent Campaigns:', 'tp-donate' ),
			'not_found'          => __( 'No campaign found.', 'tp-donate' ),
			'not_found_in_trash' => __( 'No campaign found in Trash.', 'tp-donate' )
		);

		$args = array(
			'labels'             => $labels,
            'description'        => __( 'Campaigns', 'tp-donate' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'campaign' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'dn_campaign', $args );
	}

	// register post type donate
	public function register_post_type_donate()
	{
		$labels = array(
			'name'               => _x( 'Donates', 'Donates', 'tp-donate' ),
			'singular_name'      => _x( 'Donate', 'Donate', 'tp-donate' ),
			'menu_name'          => _x( 'Donates', 'Donates', 'tp-donate' ),
			'name_admin_bar'     => _x( 'Donate', 'Donate', 'tp-donate' ),
			'add_new'            => _x( 'Add Donate', 'donate', 'tp-donate' ),
			'add_new_item'       => __( 'Add New Donate', 'tp-donate' ),
			'new_item'           => __( 'New Donate', 'tp-donate' ),
			'edit_item'          => __( 'Edit Donate', 'tp-donate' ),
			'view_item'          => __( 'View Donate', 'tp-donate' ),
			'all_items'          => __( 'Donates', 'tp-donate' ),
			'search_items'       => __( 'Search Donates', 'tp-donate' ),
			'parent_item_colon'  => __( 'Parent Donates:', 'tp-donate' ),
			'not_found'          => __( 'No donates found.', 'tp-donate' ),
			'not_found_in_trash' => __( 'No donates found in Trash.', 'tp-donate' )
		);

		$args = array(
			'labels'             => $labels,
            'description'        => __( 'Donates', 'tp-donate' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => 'tp_donate',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'donate' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'capabilities' => array(
				'create_posts'       => false,
			),
		);

		register_post_type( 'dn_donate', $args );
	}

	// register post type donor
	public function register_post_type_donor()
	{
		$labels = array(
			'name'               => _x( 'Donors', 'Donors', 'tp-donate' ),
			'singular_name'      => _x( 'Donor', 'Donor', 'tp-donate' ),
			'menu_name'          => _x( 'Donors', 'Donors', 'tp-donate' ),
			'name_admin_bar'     => _x( 'Donor', 'Donor', 'tp-donate' ),
			'add_new'            => _x( 'Add Donor', 'donate', 'tp-donate' ),
			'add_new_item'       => __( 'Add New Donor', 'tp-donate' ),
			'new_item'           => __( 'New Donor', 'tp-donate' ),
			'edit_item'          => __( 'Edit Donor', 'tp-donate' ),
			'view_item'          => __( 'View Donor', 'tp-donate' ),
			'all_items'          => __( 'Donors', 'tp-donate' ),
			'search_items'       => __( 'Search Donors', 'tp-donate' ),
			'parent_item_colon'  => __( 'Parent Donors:', 'tp-donate' ),
			'not_found'          => __( 'No donors found.', 'tp-donate' ),
			'not_found_in_trash' => __( 'No donors found in Trash.', 'tp-donate' )
		);

		$args = array(
			'labels'             => $labels,
            'description'        => __( 'Donors', 'tp-donate' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => 'tp_donate',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'donor' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'capabilities' => array(
				'create_posts'       => false,
			),
		);

		register_post_type( 'dn_donor', $args );
	}

	// register taxonomy
	public function register_taxonomy_causes()
	{
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Campaign Categories', 'tp-donate' ),
			'singular_name'     => _x( 'Campaign', 'tp-donate' ),
			'search_items'      => __( 'Search Campaigns', 'tp-donate' ),
			'all_items'         => __( 'All Campaigns', 'tp-donate' ),
			'parent_item'       => __( 'Parent Campaign', 'tp-donate' ),
			'parent_item_colon' => __( 'Parent Campaign:', 'tp-donate' ),
			'edit_item'         => __( 'Edit Campaign', 'tp-donate' ),
			'update_item'       => __( 'Update Campaign', 'tp-donate' ),
			'add_new_item'      => __( 'Add New Campaign', 'tp-donate' ),
			'new_item_name'     => __( 'New Campaign Name', 'tp-donate' ),
			'menu_name'         => __( 'Categories', 'tp-donate' )
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'campaign_cat' ),
		);

		register_taxonomy( 'dn_campaign_cat', array( 'dn_campaign' ), $args );

		// Add new taxonomy, make it hierarchical (like tags)
		$labels = array(
			'name'              => _x( 'Campaign Tags', 'tp-donate', 'tp-donate' ),
			'singular_name'     => _x( 'Campaign', 'tp-donate' ),
			'search_items'      => __( 'Search Campaigns Tag', 'tp-donate' ),
			'all_items'         => __( 'All Campaigns', 'tp-donate' ),
			'parent_item'       => __( 'Parent Campaign Tag', 'tp-donate' ),
			'parent_item_colon' => __( 'Parent Campaign Tag:', 'tp-donate' ),
			'edit_item'         => __( 'Edit Campaign Tag', 'tp-donate' ),
			'update_item'       => __( 'Update Campaign Tag', 'tp-donate' ),
			'add_new_item'      => __( 'Add New Campaign Tag', 'tp-donate' ),
			'new_item_name'     => __( 'New Campaign Tag Name', 'tp-donate' ),
			'menu_name'         => __( 'Tags', 'tp-donate' )
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'campaign_tag' ),
		);

		register_taxonomy( 'dn_campaign_tag', array( 'dn_campaign' ), $args );
	}

}

new DN_Post_Type();