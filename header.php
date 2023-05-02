<?php 
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->
<!--[if gte IE 9] <style type="text/css"> .gradient {filter: none;}</style><![endif]-->
<!--[if !IE]><html lang="en"><![endif]-->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->    
    <style>
    :root {
        --mos-body-bg: <?php echo carbon_get_theme_option( 'mos_body_bg' )?carbon_get_theme_option( 'mos_body_bg' ):'#fff'?>;       
        --mos-primary-color: <?php echo carbon_get_theme_option( 'mos_primary_color' )?carbon_get_theme_option( 'mos_primary_color' ):'#00f5eb'?>;            
        --mos-secondary-color: <?php echo carbon_get_theme_option( 'mos_secondary_color' )?carbon_get_theme_option( 'mos_secondary_color' ):'#21fff6'?>;            
        --mos-content-color: <?php echo carbon_get_theme_option( 'mos_content_color' )?carbon_get_theme_option( 'mos_content_color' ):'#212529'?>;       
    }    
    </style>
    <?php wp_head(); ?>
    <script>
        function hideLoader() {
            console.log(0);
            //document.querySelector(".se-pre-con").style.display = "none";
            document.getElementById("page-loader").classList.add("d-none");
        }
    </script>
</head>

<body <?php body_class(); ?> <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?> onload='document.getElementById("page-loader").classList.add("d-none")' <?php endif?>>
    <?php var_dump(carbon_get_theme_option( 'mos-header-mobile-enable' )); ?>
    <?php echo "Phone: "?>
    <?php echo do_shortcode("[mos-translate input='input']")?>
    <?php _e_mos_translate('Vasa', true);?>
    <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?>
    <div id="page-loader" class="se-pre-con position-fixed top-0 start-0 bottom-0 end-0 d-flex justify-content-center align-items-center <?php echo carbon_get_theme_option( 'mos-page-loader-class' )?>" <?php if (carbon_get_theme_option( 'mos-page-loader-background' )) echo 'style="background-color:'.carbon_get_theme_option( 'mos-page-loader-background' ).'"' ?>>
        <?php if(carbon_get_theme_option( 'mos-page-loader-image' )): ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-page-loader-image' ), 'full', "", array( "class" => "loading-image" ) );  ?>
        <div class="rotating-border"></div>
        <?php else: ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php endif?>
    </div>
    <?php endif; ?>
    <div class="<?php echo carbon_get_theme_option( 'mos-site-layout' ) ?>" id="container">
    
      <div class="wrapper cf">       
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobilemenu',
                    'container' => 'nav',
                    'container_class' => 'mobile-nav',
                    'container_id' => 'mobile-nav',
                    'menu_class' => 'first-nav',                        
                ));        
            ?>
            <?php //echo do_shortcode('[mobile-menu]') ?>
      </div>
    
        <header id="header" class="main-header smooth <?php echo carbon_get_theme_option( 'mos-header-class' ) ?>">
            <div class="wrapper">
                <?php 
                $option_header_layout = carbon_get_theme_option( 'mos-header-layout' );
                $mos_page_header_type = carbon_get_post_meta( get_the_ID(), 'mos_page_header_type' );
                $mos_page_header_layout = carbon_get_post_meta( get_the_ID(), 'mos_page_header_layout' );
                $header_layout = ($mos_page_header_type == 'custom')?$mos_page_header_layout:$option_header_layout;

                if($mos_page_header_type != 'none' && @$header_layout) : 
                ?>
                <?php 
                    $layout_id = $header_layout[0]['id'];//This is page id or post id
                    $content_post = get_post($layout_id);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;            
                ?>
                <?php endif?>
            </div>
        </header>

