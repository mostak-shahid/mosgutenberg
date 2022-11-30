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
        <?php if (carbon_get_theme_option( 'mos_primary_color' )) : ?>
        --primary-color: <?php echo carbon_get_theme_option( 'mos_primary_color' )?>;
        <?php endif?>
        <?php if (carbon_get_theme_option( 'mos_secondary_color' )) : ?>        
        --secondary-color: <?php echo carbon_get_theme_option( 'mos_secondary_color' )?>;
        <?php endif?>
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

    <header class="main-header smooth <?php echo carbon_get_theme_option( 'mos-header-class' ) ?>">
        <div class="wrapper">
            <!--d-flex justify-content-between align-items-center-->
            <!--           
            <div class="logo-area">
                <a href="<?php echo home_url()?>">
                    <?php if(carbon_get_theme_option( 'mos-logo' )): ?>
                    <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "loading-image" ) );  ?>
                    <?php else: ?>
                    <?php echo get_bloginfo('name')?>
                    <?php endif?>
                </a>
            </div>

            <div class="menu-area position-static position-xl-relative">
                <div class="position-static navbar navbar-expand-xl navbar-dark">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse false" id="navbarSupportedContent">
                        <nav>
                            <?php
                            /*wp_nav_menu(array(
                               'theme_location' => 'mainmenu',
                               'container' => 'ul',
                               'container_class' => '',
                               'menu_class' => 'mos-menu-list', 
                               'add_a_class'=> 'menu-item-link',                          
                           ));*/          
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
-->
            <div class="bootstrap-menu">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo home_url()?>">
                            <?php if(carbon_get_theme_option( 'mos-logo' )): ?>
                            <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "loading-image" ) );  ?>
                            <?php else: ?>
                            <?php echo get_bloginfo('name')?>
                            <?php endif?>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'mainmenu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'navbarText',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
