<footer class="footer">
    <div class="widgets">        
        <div class="row-wrapper">
            <div class="row">
                <div class="col-lg-4 col-sm-6 text-center text-sm-start">
                    <div class="contacts">
                        <?php if ( is_active_sidebar( "footer_1" ) ) : ?>
                        <?php dynamic_sidebar( "footer_1" ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center text-sm-start">
                    <div class="contacts">
                        <?php if ( is_active_sidebar( "footer_2" ) ) : ?>
                        <?php dynamic_sidebar( "footer_2" ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-sm-start">
                    <div class="contacts">
                        <?php if ( is_active_sidebar( "footer_3" ) ) : ?>
                        <?php dynamic_sidebar( "footer_3" ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <?php 
    $page_id = (is_home())?get_option('page_for_posts', true):get_the_ID(); 
    $option_footer_layout = carbon_get_theme_option( 'mos-footer-layout' );
    $mos_page_footer_type = carbon_get_post_meta( $page_id, 'mos_page_footer_type' );
    $mos_page_footer_layout = carbon_get_post_meta( $page_id, 'mos_page_footer_layout' );
    $footer_layout = ($mos_page_footer_type == 'custom')?$mos_page_footer_layout:$option_footer_layout;

    if($mos_page_footer_type != 'none' && @$footer_layout) : 
        $layout_id = $footer_layout[0]['id'];//This is page id or post id
        $content_post = get_post($layout_id);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;
    endif;
    ?>
</footer>
<?php 
$btt_enable = carbon_get_theme_option('mos-back-to-top');
$btt_image = carbon_get_theme_option('mos-back-to-top-image');
$btt_background = carbon_get_theme_option('mos-back-to-top-background');
$btt_class = carbon_get_theme_option('mos-back-to-top-class');
if($btt_enable) :
?>    
<div id="btt-btn" class="scrollup <?php echo $btt_class ?>" onclick="backToTop()">
    <?php if ($btt_image): ?>
    <?php echo wp_get_attachment_image( $btt_image, 'full' );  ?>
    <?php else : ?>
    <i class="fa fa-angle-up"></i>
    <?php endif?>
</div>
<?php endif?>
</div><!--/#container.<?php echo carbon_get_theme_option( 'mos-site-layout' ) ?>-->

<?php wp_footer();?>
    <!--Theme Options CSS-->
    <style>
        body {
            background-color: <?php echo carbon_get_theme_option('mos_body_bg') ? 'var(--mos-body-bg)' : 'var(--bs-body-bg)' ?>;
            color: <?php echo carbon_get_theme_option('mos_content_color') ? 'var(--mos-content-color)' : 'var(--bs-body-color)' ?>;
        }
        <?php if(carbon_get_theme_option('mos_wrapper_bg') && carbon_get_theme_option('mos-site-layout') != 'wide-layout') : ?>
        #container {
            background-color: <?php echo carbon_get_theme_option('mos_wrapper_bg') ?>;
        }
        <?php endif?>
        a {color: <?php echo carbon_get_theme_option('mos_link_color') ? carbon_get_theme_option('mos_link_color') : 'var(--bs-link-color)' ?>;}
        a:hover {color: <?php echo carbon_get_theme_option('mos_link_hover_color') ? carbon_get_theme_option('mos_link_hover_color') : 'var(--bs-link-hover-color)' ?>;}
        <?php $header_background=carbon_get_theme_option('mos-header-background');

        ?>.main-header {
            <?php if(carbon_get_theme_option('mos-header-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-header-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-header-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-header-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-border')): ?> border: <?php echo carbon_get_theme_option('mos-header-border') ?>; <?php endif?> <?php if(@$header_background && sizeof($header_background)): ?> <?php foreach($header_background as $value): ?>
                <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
        }

        <?php if(carbon_get_theme_option('mos-header-link-color')) : ?>.main-header a {
            color: <?php echo carbon_get_theme_option('mos-header-link-color') ?>
        }

        <?php endif?><?php if(carbon_get_theme_option('mos-header-link-color-hover')) : ?>.main-header a:hover {
            color: <?php echo carbon_get_theme_option('mos-header-link-color-hover') ?>
        }

        <?php endif?><?php $footer_background=carbon_get_theme_option('mos-footer-background');

        ?>.footer {
            <?php if(carbon_get_theme_option('mos-footer-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-footer-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-footer-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-footer-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-border')): ?> border: <?php echo carbon_get_theme_option('mos-footer-border') ?>; <?php endif?> <?php if(@$footer_background && sizeof($footer_background)): ?> <?php foreach($footer_background as $value): ?>
                <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
        }

        <?php if(carbon_get_theme_option('mos-footer-link-color')) : ?>.footer a {
            color: <?php echo carbon_get_theme_option('mos-footer-link-color') ?>
        }

        <?php endif?><?php if(carbon_get_theme_option('mos-footer-link-color-hover')) : ?>.footer a:hover {
            color: <?php echo carbon_get_theme_option('mos-footer-link-color-hover') ?>
        }

        <?php endif?>  
        <?php if (carbon_get_theme_option('mos-site-layout') == 'boxed-layout' && carbon_get_theme_option('mos-site-width')) : ?>
        .boxed-layout {
            width: 100%;
            max-width: <?php echo carbon_get_theme_option('mos-site-width') ?>px;
            margin-left: auto;
            margin-right: auto;
        } 
        <?php endif?> 
    </style>
    <script>  
        <?php if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') : ?>
        new WOW().init();
        <?php endif?>
        jQuery(document).ready(function($) {
                  
            var Nav = new hcOffcanvasNav("#mobile-nav", {
                disableAt: false,
                customToggle: ".toggle",
                levelOpen: "expand", //overlap, expand, false
                levelSpacing: 40,
                navTitle: "All Categories",
                levelTitles: true,
                levelTitleAsBack: true,
                pushContent: "#container",
                labelClose: false,
                position: "right", //left, right, top, bottom
                theme: "carbon",
                closeOnClick: true,
                disableBody: true,
                insertClose: true,
                insertBack: true,

            });
            <?php if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') : ?>                 
                $('body').find('.mos-owl-carousel').each(function( e ) {            
                    var oc = $(this);
                    var ocOptions = oc.data('carousel-options');
                    var defaults = {
                        loop: true,
                        nav: false,
                        autoplay: true,
                    }
                    oc.owlCarousel($.extend(defaults, ocOptions));
                });            
            <?php endif?>
            <?php if (carbon_get_theme_option( 'mos_plugin_slick' ) == 'on') : ?>
                $('.mos-slick').slick();
            <?php endif?>
        });
    </script>
    

</body>

</html>
