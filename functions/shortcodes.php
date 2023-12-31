<?php
function admin_shortcodes_page(){
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null )
    add_menu_page( 
        __( 'Theme Short Codes', 'textdomain' ),
        'Short Codes',
        'manage_options',
        'shortcodes',
        'shortcodes_page',
        'dashicons-book-alt',
        3
    ); 
}
add_action( 'admin_menu', 'admin_shortcodes_page' );
function shortcodes_page(){
	?>
<div class="wrap">
    <h1>Theme Short Codes</h1>
    <ol>
        <li>[home-url slug=''] <span class="sdetagils">displays home url</span></li>
        <li>[site-identity class='' container_class=''] <span class="sdetagils">displays site identity according to theme option</span></li>
        <li>[site-name link='0'] <span class="sdetagils">displays site name with/without site url</span></li>
        <li>[copyright-symbol] <span class="sdetagils">displays copyright symbol</span></li>
        <li>[this-year] <span class="sdetagils">displays 4 digit current year</span></li>
        <li>[email class='' display='all' title='0'] <span class="sdetagils">displays email from theme options</span></li>
        <li>[phone class='' display='all' title='0'] <span class="sdetagils">displays phone from theme options</span></li>
    </ol>
</div>
<?php
}
function home_url_func( $atts = array(), $content = '' ) {
	$atts = shortcode_atts( array(
		'slug' => '',
	), $atts, 'home-url' );

	return home_url( $atts['slug'] );
}
add_shortcode( 'home-url', 'home_url_func' );
function site_identity_func( $atts = array(), $content = null ) {
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
		'container_class' => ''
	), $atts, 'site-identity' ); 
    ob_start(); ?>
<div class="logo-wrapper <?php echo $atts['container_class']?>">
    <a class="logo <?php echo $atts['class']?>" href="<?php echo home_url()?>">
        <?php if(carbon_get_theme_option( 'mos-logo' )) : ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "img-responsive img-fluid" ) );  ?>
        <?php else : ?>
        <h1 class="site-title"><a href="<?php echo home_url()?>"><?php echo get_bloginfo('name')?></a></h1>
        <p class="site-description"><?php echo get_bloginfo( 'description' )?></p>
        <?php endif?>
    </a>
</div>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'site-identity', 'site_identity_func' );
function site_name_func( $atts = array(), $content = '' ) {
	$html = '';
	$atts = shortcode_atts( array(
		'link' => 0,
	), $atts, 'site-name' );
    
	if ($atts['link']) $html .=	'<a href="'.esc_url( home_url( '/' ) ).'">';
	$html .= get_bloginfo('name');
	if ($atts['link']) $html .=	'</a>';
	return $html;
}
add_shortcode( 'site-name', 'site_name_func' );
function copyright_symbol_func() {
	return '&copy;';
}
add_shortcode( 'copyright-symbol', 'copyright_symbol_func' );
function this_year_func() {
	return date('Y');
}
add_shortcode( 'this-year', 'this_year_func' );

function email_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'display' => 'all',
		'title' => 0,
	), $atts, 'email' );  
    ob_start();     
    $emails = carbon_get_theme_option( 'mos-contact-email' );  
    if($emails && sizeof($emails)) :
    ?>
<span class="email-wrapper <?php echo $atts['class'] ?>">
    <?php if (!is_numeric($atts['display'])) : ?>
    <?php foreach($emails as $email) :?>
    <span class="email-unit">
        <span class="email-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $email['title'] ?></span>
        <span class="email-link"><a href="mailto:<?php echo $email['email'] ?>"><?php echo $email['email'] ?></a></span>
    </span>
    <?php endforeach;?>
    <?php else : ?>
    <span class="email-unit">
        <span class="email-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $emails[$atts['display']]['title'] ?></span>
        <span class="email-link"><a href="mailto:<?php echo $emails[$atts['display']]['email'] ?>"><?php echo $emails[$atts['display']]['email'] ?></a></span>
    </span>
    <?php endif ?>
    <?php echo do_shortcode($content) ?>
</span>
<?php endif?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'email', 'email_func' );

function phone_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'display' => 'all',
		'title' => 0,
	), $atts, 'phone' );  
    ob_start();     
    $phones = carbon_get_theme_option( 'mos-contact-phone' );  
    if($phones && sizeof($phones)) :
    ?>
<span class="phone-wrapper <?php echo $atts['class'] ?>">
    <?php if (!is_numeric($atts['display'])) : ?>
    <?php foreach($phones as $phone) :?>
    <span class="phone-unit">
        <span class="phone-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $phone['title'] ?></span>
        <span class="phone-link"><a href="mailto:<?php echo $phone['number'] ?>"><?php echo $phone['number'] ?></a></span>
    </span>
    <?php endforeach;?>
    <?php else : ?>
    <span class="phone-unit">
        <span class="phone-title <?php if(!$atts['title']) echo 'd-none'?>"><?php echo $phones[$atts['display']]['title'] ?></span>
        <span class="phone-link"><a href="mailto:<?php echo $phones[$atts['display']]['number'] ?>"><?php echo $phones[$atts['display']]['number'] ?></a></span>
    </span>
    <?php endif ?>
    <?php echo do_shortcode($content) ?>
</span>
<?php endif?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'phone', 'phone_func' );

function mos_mobile_menu_func( $atts = array(), $content = null ) {
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
		'title' => '',
	), $atts, 'mobile-menu' ); 
    ob_start(); ?>
    <a class="toggle position-relative d-inline-block <?php echo @$atts['class']?>" href="#"><span></span></a>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'mobile-menu', 'mos_mobile_menu_func' );


function _mos_translate($input='', $ucf=false){
    $words = carbon_get_theme_option( 'mos-translate' );
    $found = 0;
    foreach($words as $word) {
        if (strtolower($word['input']) == strtolower($input)) {
            $found++;
            break;
        } 
    }
    $t_input = __($input, 'mosgutenberg');
    return ($ucf)?(ucfirst(($found)?$word['output']:$t_input)):strtolower(($found)?$word['output']:$t_input);
}
function _e_mos_translate($input='', $ucf=false){
    echo _mos_translate($input, $ucf);
}

function mos_translate_func( $atts = array(), $content = null ) {
	$atts = shortcode_atts( array(
		'input' => '',
        'ucf' => false
	), $atts, 'mos-translate' ); 
    return _mos_translate($atts['input'],$atts['ucf']);
}
add_shortcode( 'mos-translate', 'mos_translate_func' );

function page_title_func( $atts = array(), $content = null ) {
    if (is_archive()) {
        $page_title = get_the_archive_title();
    }
    else if (is_home()) {
        $page_title = get_the_title( get_option('page_for_posts', true));
    }
    else if (is_search()) {
        $page_title = 'Search result for: ' . get_search_query();
    }
    else {
        $page_title = get_the_title( get_the_ID() );
    }
    
	$atts = shortcode_atts( array(
		'tag' => 'h1',
        'class' => '',
        'text' => ''
	), $atts, 'page-title' ); 
    ob_start(); ?>
<<?php echo @$atts['tag']?> class="<?php echo @$atts['class']?>">
    <?php echo (@$atts['text'])?$atts['text']:$page_title ?></<?php echo @$atts['tag']?>>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'page-title', 'page_title_func' );


function page_short_description_func( $atts = array(), $content = null ) {
    $page_id = (is_home())?get_option('page_for_posts', true):get_the_ID();
    $short_description = carbon_get_post_meta( $page_id, 'mos_page_short_description' );
	$atts = shortcode_atts( array(
		'tag' => 'div',
        'class' => '',
        'text' => ''
	), $atts, 'page-short-description' ); 
    ob_start(); ?>
<<?php echo @$atts['tag']?> class="<?php echo @$atts['class']?>">
    <?php echo (@$atts['text'])?$atts['text']:$short_description ?></<?php echo @$atts['tag']?>>
<?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'page-short-description', 'page_short_description_func' );

function feature_image_func( $atts = array(), $content = null ) {    
    $page_id = (is_home())?get_option('page_for_posts', true):get_the_ID();
	$atts = shortcode_atts( array(
		'tag' => 'div',
        'class' => '',
        'text' => ''
	), $atts, 'feature-image' ); 
    ob_start(); ?>
<<?php echo @$atts['tag']?> class="<?php echo @$atts['class']?>">
    <?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();
    }
    ?>
    <?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'feature-image', 'feature_image_func' );

function breadcrumbs_func( $atts = array(), $content = null ) {
    $short_description = carbon_get_post_meta( get_the_ID(), 'mos_page_short_description' );
	$atts = shortcode_atts( array(
		'tag' => 'div',
        'class' => '',
        'text' => ''
	), $atts, 'breadcrumbs' ); 
    ob_start(); ?>

    <?php return vertical_breadcrumbs()?>
    <?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'breadcrumbs', 'breadcrumbs_func' );
