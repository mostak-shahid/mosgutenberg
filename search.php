<?php 
get_header();

$banner_enable = carbon_get_theme_option( 'mos-search-banner-enable' );
$banner_title = carbon_get_theme_option( 'mos-search-banner-title' );
$banner_subtitle = carbon_get_theme_option( 'mos-search-banner-subtitle' );
$banner_intro = carbon_get_theme_option( 'mos-search-banner-intro' );
$banner_image = carbon_get_theme_option( 'mos-search-banner-image' );
$banner_button_title = carbon_get_theme_option( 'mos-search-banner-button-title' );
$banner_button_url = carbon_get_theme_option( 'mos-search-banner-button-url' );

$newsletter_enable = carbon_get_theme_option( 'mos-search-newsletter-enable' );
$newsletter_title = carbon_get_theme_option( 'mos-search-newsletter-title' );
$newsletter_subtitle = carbon_get_theme_option( 'mos-search-newsletter-subtitle' );
$newsletter_intro = carbon_get_theme_option( 'mos-search-newsletter-intro' );
$newsletter_button_title = carbon_get_theme_option( 'mos-search-newsletter-button-title' );
$newsletter_button_url = carbon_get_theme_option( 'mos-search-newsletter-button-url' );
?>
<?php if ($banner_enable == 'on') :?>
<section class="subPageBanner position-relative bgClrDarkLight">
    <div class="container-lg">
        <div class="bannerContent row align-items-center">
            <div class="bannerInfo col-lg-6">
                <?php if ($banner_subtitle) : ?>
                <h6 class="banner-tag-line textClrGreen fs-6 fwBold"><?php echo $banner_subtitle ?></h6>
                <?php endif ?>
                <?php if ($banner_title) : ?>
                <div class="banner-heading fs-48 fw-normal"><?php echo do_shortcode($banner_title);?></div>
                <?php endif?>
                <?php if ($banner_intro) : ?>
                <div class="banner-desc"><?php echo $banner_intro ?></div>
                <?php endif?>
            </div>
            <?php if (@$banner_image) :?>
            <div class="bannerImage col-lg-6 text-center text-lg-end">
                <?php echo wp_get_attachment_image( $banner_image, 'full', '', array( "class" => "lazy-load-image lazyload img-fluid img-banner" ) ); ?>
            </div>
            <?php endif?>
        </div>
    </div>
</section>
<?php endif?>

<section id="blogWrapper" class="blogWrapper commonPadding">
    <div class="filterArea pb-5 isBgBorder mb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-xl-6">
                    <div class="filterLeft">
                        <div class="singleFilter custom-mos-select">
                            <?php $categories = mos_get_terms('category'); ?>
                            <select class="bg-transparent rounded-pill px-4 form-select postFilter">
                                <option value="0" selected="">All Categories</option>
                                <?php foreach($categories as $category) : ?>
                                <option value="<?php echo home_url().'/?s=&category='.$category['term_id'] ?>" <?php echo (@$_GET['category'] == $category['term_id'])?'selected':'' ?>><?php echo $category['name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="singleFilter custom-mos-select">
                            <select class="bg-transparent rounded-pill px-4 form-select postFilter">
                                <option value="<?php echo home_url().'/?s=&time=' ?>0" selected="">Select One</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>week" <?php echo (@$_GET['time'] == 'week')?'selected':''?>>Last 7 day's</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>month" <?php echo (@$_GET['time'] == 'month')?'selected':''?>>Last Month</option>
                                <option value="<?php echo home_url().'/?s=&time=' ?>year" <?php echo (@$_GET['time'] == 'year')?'selected':''?>>Last year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
                <div class="col-xl-3">
                    <div class="searchInput">
                        <?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <?php
//        echo @$_GET['category'];
//        echo @$_GET['time'];
        $args = array( 
            'post_type' 		=> 'post'
        );
        if (@$_GET['s']) $args['s'] = $_GET['s'];
        if (@$_GET['category']) {
            $args['cat'] = $_GET['category'];
        }
        if (@$_GET['time']) {
            $today = getdate();
            if ($_GET['time'] == 'week') $args['date_query'][]['after'] = '1 week ago';  
            elseif ($_GET['time'] == 'month') $args['monthnum'] = $today['mon'];            
            elseif ($_GET['time'] == 'year') $args['year'] = $today['year']; 
        }
        $query = new WP_Query( $args );
//        echo '<pre>';
//        var_dump($args);
//        echo '</pre>';
        ?>
        <?php if ( $query->have_posts() ) :?>
        <div id="blogs" class="row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="item-wrapper h-100">
                    <div class="singleBlog isRadius16 d-flex flex-column justify-content-between">
                        <div class="content-part">
                            <?php 
                                if (has_post_thumbnail()) : 
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                $featured_img_resized = aq_resize($featured_img_url, 350, 200, true);
                            ?>
                            <div class="blogImage">
                                <a class="text-decoration-none" href="<?php echo get_the_permalink() ?>">
                                    <img decoding="async" class="lazy-load-image lazyload img-fluid w-100" src="<?php echo $featured_img_resized?$featured_img_resized:$featured_img_url ?>" alt="<?php echo get_the_title() ?>" width="350px" height="200px" loading="lazy">
                                </a>
                            </div>
                            <?php endif?>
                            <div class="blogInfo p-4">
                                <h3 class="blogTitle fs-6 fw-bold mb-2">
                                    <a class="text-decoration-none text-white" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                                </h3>
                                <div class="blogDesc textClrGray fw-normal fs-14">
                                    <p class="mb-0"><?php echo wp_trim_words( get_the_content(), 28, '...' )?></p>
                                </div>
                            </div>
                        </div>
                        <div class="link-part p-4 pt-0">
                            <a class="readMore d-flex align-items-center fs-14 fwSemiBold text-decoration-none" href="<?php echo get_the_permalink() ?>">
                                <span>Read More</span>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6265 5.18872L17.9377 10.5L12.6265 15.8112" stroke="#6B6E78" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3.0625 10.5H17.7887" stroke="#6B6E78" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="search-pagination-wrapper pagination-wrapper">
           <nav class="navigation pagination">
               <div class="nav-links">
            <?php
//                the_posts_pagination( array(
//                    'show_all' => false,
//                    'screen_reader_text' => " ",
//                    'prev_text'          => 'Prev',
//                    'next_text'          => 'Next',
//                ) );
            ?>
            <?php 
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $query->max_num_pages,
                    'prev_text'          => __('Prev'),
                    'next_text'          => __('Next')
                ));
            ?>
                   
               </div>
           </nav>
        </div>
        <?php else : ?>
        <?php get_template_part( 'content', 'none' ); ?>
        <?php endif;?>
    </div>
</section>

<?php if ($newsletter_enable == 'on') :?>
<section id="section-archive-newslatter" class="commonPadding section-archive-newslatter newslatter">
    <div class="container-lg">
        <div class="part-one text-center">
            <?php if ($newsletter_subtitle) : ?><div class="secTagLine"><?php echo $newsletter_subtitle ?></div><?php endif?>
            <?php if ($newsletter_title || $newsletter_intro) : ?>
            <div class="secIntro">
                <?php if ($newsletter_title) : ?><h2><?php echo $newsletter_title ?></h2><?php endif?>
                <?php if ($newsletter_intro) : ?><p><?php echo $newsletter_intro ?></p><?php endif?>
            </div>
            <?php endif?>
            <?php if ($newsletter_button_title && $newsletter_button_url) : ?>
            <div class="btn-wrapper">
                <a class="btn position-relative border-0 rounded-pill d-flex align-items-center justify-content-center gap-2" href="<?php echo do_shortcode($newsletter_button_url) ?>">
                    <span><?php echo $newsletter_button_title ?></span>
                    <span class="btn-arrow"></span>
                </a>
            </div>
            <?php endif?>
        </div>
    </div>
</section>
<?php endif?>
<?php get_footer() ?>
