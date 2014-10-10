<?php
//Register meta boxes for events
add_filter( 'rwmb_meta_boxes', 'bib_register_meta_boxes',10);

function bib_register_meta_boxes($meta_boxes) {
	global $pagenow;
	if($pagenow !== 'post-new.php' && $pagenow !== 'post.php'){
		return;
	}

	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
			
$meta_boxes[] = array(
	'id'       => 'book_data',
	'title'    => '<div class="dashicons dashicons-index-card"></div> Book Information',
	'pages'    => array( 'book'),
	'context'  => 'normal',
	'priority' => 'high',
	'tab_style'	=> 'default',
	'tabs'     => array (
				'basic'      => array(
							'label'     => 'Basic Info',
							'icon'      => 'dashicons-admin-site'
						),
				'advanced'   => array(
							'label'     => 'Advanced Info',
							'icon'      => 'dashicons-archive'
						)
	),
	'fields' => array(
		array(
			'name'		=> '<div class="dashicons dashicons-editor-justify"></div> ISBN-13',
			'id'		=> 'isbn_13',
			'type'		=> 'text',
			'tab'		=> 'basic'
		),
		//Date
		array(
			'name'		=> '<div class="dashicons dashicons-menu"></div> ISBN-10',
			'id'		=> "isbn_10",
			'type'		=> 'text',
			'tab'		=> 'basic'
		),
		// Time
		array(
			'name'		=> '<div class="dashicons dashicons-welcome-learn-more"></div> Publisher',
			'id'		=> "publisher",
			'type'		=> 'text',
			'tab'		=> 'advanced',
			'js_options' => array(
					'ampm'         => true,
					'hourGrid'     => 4,
					'minuteGrid'   => 10,
					'hourMin'      => 6,
					'hourMax'      => 24,
					'showSecond'   => false,
					'timeFormat'   => "h:mm tt",
					'stepHour'     => 1,
					'stepMinute'   => 5
				)
			)
		)
	);
	return $meta_boxes;
}