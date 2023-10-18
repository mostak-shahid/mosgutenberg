<?php
show_admin_bar( false );
// add_filter('show_admin_bar', false, PHP_INT_MAX);
function disable_edit_options() {
	define('DISALLOW_FILE_EDIT',true);
	define('DISALLOW_FILE_MODS',true);
}
//add_action('init','disable_edit_options');
//require_once('functions/theme-init/plugin-update-checker.php');
//$themeInit = Puc_v4_Factory::buildUpdateChecker(
//	'https://raw.githubusercontent.com/mostak-shahid/update/master/mosgutenberg.json',
//	__FILE__,
//	'mosgutenberg'
//);

require_once('functions/theme-functions.php');
require_once('functions/scripts.php');
require_once('functions/setup.php');
require_once('functions/shortcodes.php');
require_once('functions/widgets.php');
require_once('functions/custom-comments.php');
require_once('functions/theme-filter-hooks.php');
require_once('functions/ajax.php');

require_once('inc/TGM-Plugin-Activation-develop/plugin-management.php');

require_once('functions/aq_resizer.php');
require_once('functions/Mobile_Detect.php');
//require_once('functions/bs4navwalker.php');
require_once('functions/class-wp-bootstrap-navwalker.php');
require_once('functions/breadcrumb.php');
require_once('functions/contact-form-7-element.php');
require_once('functions/post-types.php');
require_once('functions/postgrid-column-custimozation.php');
require_once('carbon-fields.php');
require_once('functions/theme-options.php');
require_once('functions/gutenberg-blocks.php');
require_once('functions/post-metas.php');
require_once('functions/woo-functions.php');
require_once('functions/ocdi.php');

/*if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {    
    // WP > 5 beta
    add_filter('use_block_editor_for_post_type', '__return_false', 100);    
} else {    
    // WP < 5 beta
    add_filter('gutenberg_can_edit_post_type', '__return_false');    
}*/
require_once('functions/MOS_Options_Panel.php');
// Register new Options panel.
$panel_args = [
    'title'           => 'My Options',
    'option_name'     => 'my_options',
    'slug'            => 'my-options-panel',
    'user_capability' => 'manage_options',
    'tabs'            => [
        'tab-1' => esc_html__( 'Tab 1', 'text_domain' ),
        'tab-2' => esc_html__( 'Tab 2', 'text_domain' ),
        'tab-3' => esc_html__( 'Tab 3', 'text_domain' ),
    ],
    'subtabs' => [
        'tab-1'=> ['tab-1-1' => esc_html__( 'Tab 1.1', 'text_domain' ),'tab-1-2' =>esc_html__( 'Tab 1.2', 'text_domain' )],           
        'tab-2'=> ['tab-2-1' => esc_html__( 'Tab 2.1', 'text_domain' ),'tab-2-2' =>esc_html__( 'Tab 2.2', 'text_domain' )],           
    ],
];

$panel_settings = [
    // Tab 1
    'checkbox' => [
        'label'       => esc_html__( 'Checkbox Option', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes I like to add lavel too',
        'description' => 'My checkbox field description.',
        'tab'         => 'tab-1',
    ],
    'select' => [
        'label'       => esc_html__( 'Select Option', 'text_domain' ),
        'type'        => 'select',
        'description' => 'My select field description.',
        'choices'     => [
            ''         => esc_html__( 'Select', 'text_domain' ),
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
        'tab'         => 'tab-1',
    ],
    'radio' => [
        'label'       => esc_html__( 'Radio Option', 'text_domain' ),
        'type'        => 'radio',
        'description' => 'My select field description.',
        'choices'     => [
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
        'tab'         => 'tab-1-1',
    ],
    'color' => [
        'label'       => esc_html__( 'Color Option', 'text_domain' ),
        'type'        => 'color',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'date' => [
        'label'       => esc_html__( 'Date Option', 'text_domain' ),
        'type'        => 'date',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'time' => [
        'label'       => esc_html__( 'Time Option', 'text_domain' ),
        'type'        => 'time',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'datetime' => [
        'label'       => esc_html__( 'Datetime Option', 'text_domain' ),
        'type'        => 'datetime',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'url' => [
        'label'       => esc_html__( 'URL Option', 'text_domain' ),
        'type'        => 'url',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'number' => [
        'label'       => esc_html__( 'Number Option', 'text_domain' ),
        'type'        => 'number',
        'description' => 'My field 1 description.',
        'min'         => 10,
        'max'         => 50,
        'step'        => 10,
        'tab'         => 'tab-1',
    ],
    'range' => [
        'label'       => esc_html__( 'Range Option', 'text_domain' ),
        'type'        => 'range',
        'description' => 'My field 1 description.',
        'min'         => 10,
        'max'         => 100,
        'step'        => 5,
        'tab'         => 'tab-1',
    ],
    'tel' => [
        'label'       => esc_html__( 'Tel Option', 'text_domain' ),
        'type'        => 'tel',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    'repeater' => [
        'label'       => esc_html__( 'Repeater Option', 'text_domain' ),
        'type'        => 'repeater',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-1',
    ],
    // Tab 2
    'text' => [
        'label'       => esc_html__( 'Text Option', 'text_domain' ),
        'type'        => 'text',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-2',
    ],
    'textarea' => [
        'label'       => esc_html__( 'Textarea Option', 'text_domain' ),
        'type'        => 'textarea',
        'description' => 'My textarea field description.',
        'tab'         => 'tab-2',
    ],
    'image' => [
        'label'       => esc_html__( 'Image Option', 'text_domain' ),
        'type'        => 'image',
        'description' => 'My field 1 description.',
        'tab'         => 'tab-2',
    ],
];
//new MOS_Options_Panel( $panel_args, $panel_settings );

$panel_args = [
    'page_title'      => 'Theme Settings',
    'menu_title'      => 'Theme Settings',
    'menu_position'   => 91,
	//'parent_slug'	  => 'edit.php?post_type=qa',
    'option_name'     => 'mos_theme_settings',
    'slug'            => 'mos_theme_settings',
    'user_capability' => 'manage_options',
    'tabs'            => [
        'basic' => esc_html__( 'Basic', 'text_domain' ),
        'ordering' => esc_html__( 'Ordering', 'text_domain' ),
        'styling' => esc_html__( 'Styling', 'text_domain' ),
        'advanced' => esc_html__( 'Advanced', 'text_domain' ),
		'basic-fields' =>  esc_html__( 'Basic Fields', 'text_domain' ),
		'color' =>  esc_html__( 'Color', 'text_domain' ),
		'design-fields' =>  esc_html__( 'Design Fields', 'text_domain' ),
		'media-uploads' =>  esc_html__( 'Media Uploads', 'text_domain' ),
		'typography' =>  esc_html__( 'Typography', 'text_domain' ),
    ],
    'subtabs' => [
        'basic'=> ['basic-functionality' => esc_html__( 'Functionality', 'text_domain' ),'basic-display' =>esc_html__( 'Display', 'text_domain' )],   
		'styling' => ['styling-heading' => esc_html__( 'Heading', 'text_domain' ),'styling-icon' => esc_html__( 'Icon', 'text_domain' ),'styling-content' => esc_html__( 'Content', 'text_domain' )],         
        //'tab-2'=> ['tab-2-1' => esc_html__( 'Tab 2.1', 'text_domain' ),'tab-2-2' =>esc_html__( 'Tab 2.2', 'text_domain' )],           
    ],
];

$panel_settings = [
    // Basic
    'faqs-page' => [
        'label'       => esc_html__( 'FAQs Page', 'text_domain' ),
        'type'        => 'select',
        'description' => esc_html__( 'Select a page on your site to automatically display all of the FAQs you have created. Alternatively, you can also use the blocks and shortcodes to display your FAQs on pages other than the one selected above.', 'text_domain' ),
        'choices'     => [
            ''         => esc_html__( 'Select', 'text_domain' ),
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
        'tab'         => 'basic',
    ],	
    'comment' => [
        'label'       => esc_html__( 'Turn On Comment Support', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should comment support be turned on, so that if the "Allow Comments" checkbox is selected for a given FAQ, comments are shown in the FAQ list?', 'text_domain' ),
        'tab'         => 'basic',
    ],
    'disable-microdata' => [
        'label'       => esc_html__( 'Disable Microdata', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'By default, the plugin adds FAQ page scheme when the shortcode is used. Select this option to disable this behaviour.', 'text_domain' ),
        'tab'         => 'basic',
    ],
	'include-permalink' => [
        'label'       => esc_html__( 'Include Permalink', 'text_domain' ),
        'type'        => 'radio',
        'description' => esc_html__( 'Display permalink to each question? If so, text, icon or both?', 'text_domain' ),
        'choices'     => [
            'none' => esc_html__( 'None', 'text_domain' ),
            'text' => esc_html__( 'Text', 'text_domain' ),
            'icon' => esc_html__( 'Icon', 'text_domain' ),
            'both' => esc_html__( 'Both', 'text_domain' ),
        ],
		'default'  => 'none',
        'tab'         => 'basic',
    ],
	'permalink-destination' => [
        'label'       => esc_html__( 'Permalink Destination', 'text_domain' ),
        'type'        => 'radio',
        'description' => esc_html__( 'Should the permalink link to the main FAQ page or the individual FAQ page?', 'text_domain' ),
        'choices'     => [
            'main' => esc_html__( 'Main FAQ Page', 'text_domain' ),
            'individual' => esc_html__( 'Individual FAQ Page', 'text_domain' ),
        ],
		'default'  => 'main',
        'tab'         => 'basic',
    ],
	// Basic
	// Basic Functionality
    'disable-toggle' => [
        'label'       => esc_html__( 'Disable FAQ Toggle', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the FAQs open on a separate page when clicked, instead of opening and closing?', 'text_domain' ),
        'tab'         => 'basic-functionality',
    ],
    'faq-accordion' => [
        'label'       => esc_html__( 'FAQ Accordion', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the FAQs accordion? (Only one FAQ is open at a time, requires FAQ Toggle)', 'text_domain' ),
        'tab'         => 'basic-functionality',
    ],
    'faq-category-accordion' => [
        'label'       => esc_html__( 'FAQ Category Toggle', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the FAQ categories hide/open when they are clicked, if FAQs are being grouped by category ("Group FAQs by Category" in the "Ordering" area)?', 'text_domain' ),
        'tab'         => 'basic-functionality',
    ],
    'faq-collapse-all' => [
        'label'       => esc_html__( 'FAQ Expand/Collapse All', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should there be a control to open and close all FAQs simultaneously?', 'text_domain' ),
        'tab'         => 'basic-functionality',
    ],
	// Basic Functionality
	// Basic Display
    'hide-categories' => [
        'label'       => esc_html__( 'Hide Categories', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the categories for each FAQ be hidden?', 'text_domain' ),
        'tab'         => 'basic-display',
    ],
    'hide-tags' => [
        'label'       => esc_html__( 'Hide Tags', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the tags for each FAQ be hidden?', 'text_domain' ),
        'tab'         => 'basic-display',
    ],
    'display-all-answers' => [
        'label'       => esc_html__( 'Display All Answers', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should all answers be displayed when the page loads? (Careful if FAQ Accordion is on)', 'text_domain' ),
        'tab'         => 'basic-display',
    ],
    'display-post-author' => [
        'label'       => esc_html__( 'Display Post Author', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the display name of the post\'s author be displayed beneath the FAQ title?', 'text_domain' ),
        'tab'         => 'basic-display',
    ],
    'display-post-date' => [
        'label'       => esc_html__( 'Display Post Date', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should the date the post was created be displayed beneath the FAQ title?', 'text_domain' ),
        'tab'         => 'basic-display',
    ],
	// Basic Display
	// Ordering
    'group-faqs-by-category' => [
        'label'       => esc_html__( 'Group FAQs by Category', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes',
        'description' => esc_html__( 'Should FAQs be grouped by category, or should all categories be mixed together?', 'text_domain' ),
        'tab'         => 'ordering',
    ],
    'faq-ordering' => [
        'label'       => esc_html__( 'FAQ Ordering', 'text_domain' ),
        'type'        => 'radio',
        'description' => esc_html__( 'How should individual FAQs be ordered?', 'text_domain' ),
        'choices'     => [
            'none' => esc_html__( 'None', 'text_domain' ),
            'date' => esc_html__( 'Created Date', 'text_domain' ),
            'title' => esc_html__( 'Title', 'text_domain' ),
            'modified' => esc_html__( 'Modified Date', 'text_domain' ),
            'id' => esc_html__( 'ID', 'text_domain' ),
            'author' => esc_html__( 'Author', 'text_domain' ),
            'name' => esc_html__( 'Slug', 'text_domain' ),
            'parent' => esc_html__( 'Parent', 'text_domain' ),
            'rand' => esc_html__( 'Random', 'text_domain' ),
            'comment_count' => esc_html__( 'Comment Count', 'text_domain' ),
        ],
		'default' => 'none',
        'tab'         => 'ordering',
    ],
    'faq-sort' => [
        'label'       => esc_html__( 'Sort FAQs Ordering', 'text_domain' ),
        'type'        => 'radio',
        'description' => esc_html__( 'How should individual FAQs be ordered?', 'text_domain' ),
        'choices'     => [
            'desc' => esc_html__( 'Descending', 'text_domain' ),
            'asc' => esc_html__( 'Ascending', 'text_domain' ),
        ],
		'default' => 'desc',
        'tab'         => 'ordering',
    ],
	// Ordering
	// Styling
	'body-background-color-primary' => [
        'label'       => esc_html__( 'Primary Background Color', 'text_domain' ),
        'type'        => 'color',
        'tab'         => 'color',
    ],
	'body-link-color' => [
        'label'       => esc_html__( 'Link Color', 'text_domain' ),
        'type'        => 'link_color',
		'options'     => ['base', 'hover', 'active'],
		'defaults'    => [
			'base'    => '#ff00ff',
			'hover'   => '#ffffff',
			'active'  => '#ff0000'
		],
        'tab'         => 'color',
    ],
	'body-gradient-color' => [
        'label'       => esc_html__( 'gradient Color', 'text_domain' ),
        'type'        => 'gradient_color',
		'defaults'    => [
			'start'   => '#ffffff',
			'end'     => '#000000',
			'type'	  => 'linear',
			'angle'   => '153'
		],
        'tab'         => 'color',
    ],
	'body-background-dimensions' => [
        'label'       => esc_html__( 'Dimensions', 'text_domain' ),
        'type'        => 'dimensions',
		'options'     => ['width', 'height'],
		'defaults'    => [
			'width'    => '100%'
		],
        'tab'         => 'design-fields',
    ],
	'body-background-spacing' => [
        'label'       => esc_html__( 'Spacing', 'text_domain' ),
        'type'        => 'spacing',
		'options'     => ['top', 'right', 'bottom', 'left'],
		'defaults'    => [
			'top'     => '10px',
			'right'   => '20px',
			'bottom'  => '30px',
			'left'	  => '10px'
		],
        'tab'         => 'design-fields',
    ],
	'body-background-border' => [
        'label'       => esc_html__( 'Border Option', 'text_domain' ),
        'type'        => 'border',
		'options'     => ['top', 'right', 'bottom', 'left', 'style', 'color'],
		'defaults'    => [
			'top'     => '10px',
			'right'   => '20px',
			'bottom'  => '30px',
			'left'	  => '10px',
			'style'   => 'solid',
			'color'   => '#000000'
		],
        'tab'         => 'design-fields',
    ],
    'body-background' => [
        'label'       => esc_html__( 'Background', 'text_domain' ),
        'type'        => 'background',
        'description' => 'My field 1 description.',
		'options'     => ['color', 'repeat', 'size', 'attachment', 'position', 'image'],
		'defaults'    => [
			'color'     => '#000000',
			'repeat'   => 'no-repeat',
			'size'  => 'auto',
			'attachment'	  => 'scroll',
			'position'   => 'center center',
			'image'   => ''
		],
        'tab'         => 'design-fields',
    ],
    'body-font-size' => [
        'label'       => esc_html__( 'Typography', 'text_domain' ),
        'type'        => 'typography',
        'description' => 'My field 1 description.',
		'options'     => ['family', 'weight', 'alignment', 'size', 'height', 'color'],
		'defaults'    => [
			'family'     => '',
			'weight'   => '400',
			'alignment'  => 'left',
			'size'	  => '18px',
			'height'   => '1.2',
			'color'   => '#000000'
		],
        'output'      => array( 'h2.site-description, .entry-title' ),
        'tab'         => 'typography',
    ],
	// Styling

	// Advanced	
    'css' => [
        'label'       => esc_html__( 'Custom CSS', 'text_domain' ),
        'type'        => 'css',
        'description' => 'My textarea field description.',
        'tab'         => 'advanced',
    ],
	
    'text' => [
        'label'       => esc_html__( 'Text Option', 'text_domain' ),
        'type'        => 'text',
        'description' => 'My field 1 description.',
        'tab'         => 'basic-fields',
    ],
    'checkbox' => [
        'label'       => esc_html__( 'Checkbox Option', 'text_domain' ),
        'type'        => 'checkbox',
        'text'       => 'Yes I like to add lavel too',
        'description' => 'My checkbox field description.',
        'tab'         => 'basic-fields',
    ],
    'group_checkbox' => [
        'label'       => esc_html__( 'Radio Option', 'text_domain' ),
        'type'        => 'group_checkbox',
        'description' => 'My select field description.',
        'choices'     => [
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
		'defaults'	  => [
			'choice_1' => 0,
			'choice_2' => 1,
			'choice_3' => 1,

		],
        'tab'         => 'basic-fields',
    ],	
    'select' => [
        'label'       => esc_html__( 'Select Option', 'text_domain' ),
        'type'        => 'select',
        'description' => 'My select field description.',
        'choices'     => [
            ''         => esc_html__( 'Select', 'text_domain' ),
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
		'default'	  => 'choice_2',
        'tab'         => 'basic-fields',
    ],
    'datalist' => [
        'label'       => esc_html__( 'Datalist Option', 'text_domain' ),
        'type'        => 'datalist',
        'description' => 'My select field description.',
        'choices'     => [
            esc_html__( 'Choice 1', 'text_domain' ),
            esc_html__( 'Choice 2', 'text_domain' ),
            esc_html__( 'Choice 3', 'text_domain' ),
        ],
		'default'	  => 'Choice 2',
        'tab'         => 'basic-fields',
    ],
    'radio' => [
        'label'       => esc_html__( 'Radio Option', 'text_domain' ),
        'type'        => 'radio',
        'description' => 'My select field description.',
        'choices'     => [
            'choice_1' => esc_html__( 'Choice 1', 'text_domain' ),
            'choice_2' => esc_html__( 'Choice 2', 'text_domain' ),
            'choice_3' => esc_html__( 'Choice 3', 'text_domain' ),
        ],
		'default'	  => 'choice_3',
        'tab'         => 'basic-fields',
    ],	
    'textarea' => [
        'label'       => esc_html__( 'Textarea Option', 'text_domain' ),
        'type'        => 'textarea',
        'description' => 'My textarea field description.',
        'tab'         => 'basic-fields',
    ],
    'color' => [
        'label'       => esc_html__( 'Color Option', 'text_domain' ),
        'type'        => 'color',
        'description' => 'My field 1 description.',
        'tab'         => 'basic',
    ],
    'date' => [
        'label'       => esc_html__( 'Date Option', 'text_domain' ),
        'type'        => 'date',
        'description' => 'My field 1 description.',
        'tab'         => 'basic',
    ],
    'time' => [
        'label'       => esc_html__( 'Time Option', 'text_domain' ),
        'type'        => 'time',
        'description' => 'My field 1 description.',
        'tab'         => 'basic',
    ],
    'datetime' => [
        'label'       => esc_html__( 'Datetime Option', 'text_domain' ),
        'type'        => 'datetime',
        'description' => 'My field 1 description.',
        'tab'         => 'basic',
    ],
    'url' => [
        'label'       => esc_html__( 'URL Option', 'text_domain' ),
        'type'        => 'url',
        'description' => 'My field 1 description.',
        'tab'         => 'basic-fields',
    ],
    'number' => [
        'label'       => esc_html__( 'Number Option', 'text_domain' ),
        'type'        => 'number',
        'description' => 'My field 1 description.',
        'min'         => 10,
        'max'         => 50,
        'step'        => 10,
        'tab'         => 'basic-fields',
    ],
    'range' => [
        'label'       => esc_html__( 'Range Option', 'text_domain' ),
        'type'        => 'range',
        'description' => 'My field 1 description.',
        'min'         => 10,
        'max'         => 100,
        'step'        => 5,
        'tab'         => 'basic',
    ],
    'tel' => [
        'label'       => esc_html__( 'Tel Option', 'text_domain' ),
        'type'        => 'tel',
        'description' => 'My field 1 description.',
        'tab'         => 'basic-fields',
    ],
    'repeater' => [
        'label'       => esc_html__( 'Repeater Option', 'text_domain' ),
        'type'        => 'repeater',
        'description' => 'My field 1 description.',
        'tab'         => 'basic',
    ],
    // Tab 2
    'image' => [
        'label'       => esc_html__( 'Image Option', 'text_domain' ),
        'type'        => 'image',
        'description' => 'My field 1 description.',
        'tab'         => 'media-uploads',
    ],
];
//new Mos_Theme_Options\Options_Panel( $panel_args, $panel_settings );

/*
add_filter( 'woocommerce_checkout_fields', 'misha_remove_fields', 9999 );
function misha_remove_fields( $checkout_fields ) {
	
	// she wanted me to leave these fields in checkout
	// unset( $checkout_fields[ 'billing' ][ 'billing_first_name' ] );
	// unset( $checkout_fields[ 'billing' ][ 'billing_last_name' ] );
	// unset( $checkout_fields[ 'billing' ][ 'billing_phone' ] );
	// unset( $checkout_fields[ 'billing' ][ 'billing_email' ] );
	// unset( $checkout_fields[ 'order' ][ 'order_comments' ] ); // remove order notes
	
	// and to remove the billing fields below
	unset( $checkout_fields[ 'billing' ][ 'billing_company' ] ); // remove company field
	unset( $checkout_fields[ 'billing' ][ 'billing_country' ] );
	//unset( $checkout_fields[ 'billing' ][ 'billing_address_1' ] );
	unset( $checkout_fields[ 'billing' ][ 'billing_address_2' ] );
	unset( $checkout_fields[ 'billing' ][ 'billing_city' ] );
	unset( $checkout_fields[ 'billing' ][ 'billing_state' ] ); // remove state field
	unset( $checkout_fields[ 'billing' ][ 'billing_postcode' ] ); // remove zip code field

	return $checkout_fields;
}
add_filter( 'woocommerce_checkout_fields' , 'misha_not_required_fields', 9999 );
function misha_not_required_fields( $fields ) {
	
	unset( $fields[ 'billing' ][ 'billing_email' ][ 'required' ] );

	// the same way you can make any field required, example:
	// $fields[ 'billing' ][ 'billing_company' ][ 'required' ] = true;
	
	return $fields;
}
*/