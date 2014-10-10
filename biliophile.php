<?php
/*
	Plugin Name: Awesome Library Bibliophile
	Plugin URI: http://awesomelibrary.com
	Description: Manage your library
	Version: 1.0
	Author: A022 Digital, LLC
	Author URI: http://a022digital.com
	License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

require_once( dirname( __FILE__ ) . '/inc//meta-boxes/meta-box/meta-box.php' );
require_once( dirname( __FILE__ ) . '/bib-meta.php' );
require_once(dirname( __FILE__ ) . '/inc/meta-boxes/meta-box-group-field/meta-box-group-field.php');
require_once(dirname( __FILE__ ) . '/inc/meta-boxes/meta-box-tabs/meta-box-tabs.php');


add_action( 'init', 'bib_registrations', 0 );
function bib_registrations() {
	register_taxonomy( 'book_author', 'book', array( 'hierarchical' => false, 'label' => __('Authors', 'bib'), 'query_var' => 'book_author', 'rewrite' => array( 'slug' => 'book_author' ) ) );
	register_taxonomy( 'series', 'book', array( 'hierarchical' => false, 'label' => __('Series', 'bib'), 'query_var' => 'series', 'rewrite' => array( 'slug' => 'series' ) ) );
	
	
	register_post_type( 'book',
		array(
		  'labels' => array(
		    'name' => __( 'Book' ),
			'singular_name' => __( 'Book' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add Book' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Book' ),
			'new_item' => __( 'New Book' ),
			'view' => __( 'View Book' ),
			'view_item' => __( 'View This Book' ),
			'search_items' => __( 'Search Books' ),
			'not_found' => __( 'No Books found' ),
			'not_found_in_trash' => __( 'No Books found in Trash' ),
		  ),
		  'public' => true,
		  'menu_position' => 4,
		  'menu_icon' => 'dashicons-book-alt',
		  'hierarchical' => true,
		  'supports' => array( 'title', 'editor', 'thumbnail'),
		  'rewrite' => array( 'slug' => 'book', 'with_front' => false ),
		  'taxonomies' => array( 'category','book_author','series'),
		)
	);
}