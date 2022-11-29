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
        <li>[calendly class='' title='Book a call now'] <span class="sdetagils">displays calendly button</span></li>
        <li>[projects class='' tag='' category='' ids='' limit='-1' offset='0' orderby='' order='' column='' view='block/slider' slider-row=1 template='basic/advanced'] <span class="sdetagils">displays projects</span></li>
        <li>[projects-tab class='' limit='8' column='4'] <span class="sdetagils">displays projects</span></li>
        <li>[search-query] <span class="sdetagils">displays search query</span></li>
        <li>[jobs class='' count=6 category='' orderby='ID' order='DESC' load-more=1] <span class="sdetagils">displays jobs</span></li>
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
function search_query_func() {
    if (@$_GET['time']) {
        if ($_GET['time'] == 'week') return 'Last 7 day\'s';            
        elseif ($_GET['time'] == 'month') return 'Last Month';            
        elseif ($_GET['time'] == 'year') return 'Last year';            
    } elseif (@$_GET['category']) {
        return get_cat_name( $_GET['category'] ) . ' - category';
    } else return get_search_query();
}
add_shortcode( 'search-query', 'search_query_func' );
function site_identity_func( $atts = array(), $content = null ) {
	global $forclient_options;
	$logo_option = (carbon_get_theme_option( 'mos-logo-show' ))?carbon_get_theme_option( 'mos-logo-show' ):'title';
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
		'container_class' => ''
	), $atts, 'site-identity' ); 
    ob_start(); ?>
<div class="logo-wrapper <?php echo $atts['container_class']?>">
    <?php if($logo_option == 'logo') : ?>
    <a class="logo <?php echo $atts['class']?>" href="<?php echo home_url()?>">
        <?php if(carbon_get_theme_option( 'mos-logo' )) : ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-logo' ), 'full', "", array( "class" => "img-responsive img-fluid" ) );  ?>
        <?php else : ?>
        <img class="img-responsive img-fluid" src="<?php echo get_template_directory_uri(). '/images/logo.png'?>" alt="<?php echo get_bloginfo('name').' - Logo'?>">
        <?php endif?>
    </a>
    <?php else : ?>
    <div class="<?php echo $atts['class']?>">
        <h1 class="site-title"><a href="<?php echo home_url()?>"><?php echo get_bloginfo('name')?></a></h1>
        <p class="site-description"><?php echo get_bloginfo( 'description' )?></p>
    </div>
    <?php endif;?>
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
function calendly_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'title' => 'Book a call now',
	), $atts, 'calendly' );  
    ob_start();     
    $calendly = carbon_get_theme_option( 'mos-contact-calendly' );      
    if($calendly) :    
    ?>
<div class="calendly-btn-wrapper <?php echo $atts['class'] ?>">
    <div class="is-layout-flex wp-block-buttons">
        <div class="wp-block-button">
            <a class="wp-block-button__link wp-element-button" href="<?php echo $calendly ?>" target="_blank" rel="noreferrer noopener"><?php echo $atts['title'] ?></a>
        </div>
    </div>
</div>
<?php endif?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'calendly', 'calendly_func' );
//[projects class='' tag='' category='' ids='' limit='-1' offset='0' orderby='' order='' column='' view='block/slider' slider-row=1]
function projects_func($atts = array(), $content = '') {
    $dataAttr = '';
    $n = 1;
	$atts = shortcode_atts( array(
        'class'         => '',
        'tag'           => '',
        'category'      => '',
        'ids'           => '',
        'limit'			=> '-1',
        'orderby'		=> 'ID',
		'order'			=> 'DESC',
        'column'        => '',
        'view'          => 'block',
        'slider-row'    => 1,
        'template'      => 'basic', //basic/advanced
	), $atts, 'projects' );  
    ob_start();   
    $args = array( 
		'post_type' 		=> 'project'
	);
    $args['posts_per_page'] = $atts['limit'];
    
    if ($atts['view'] == 'block') $args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;   
	if ($atts['orderby']) $args['orderby'] = $atts['orderby'];
	if ($atts['order']) $args['order'] = $atts['order'];
    
    if ($atts['category'] OR $atts['tag']) {
		$args['tax_query'] = array();
		if ($atts['category'] AND $atts['tag']) {
			$args['tax_query']['relation'] = 'OR';
		}
		if ($atts['category']) {
			$args['tax_query'][] = array(
					'taxonomy' => 'project_category',
					'field'    => 'term_id',
					'terms'    => $atts['category'],
				);
		}
		if ($atts['tag']) {
			$args['tax_query'][] = array(
					'taxonomy' => 'project_tag',
					'field'    => 'term_id',
					'terms'    => $atts['tag'],
				);
		}
	}
    if ($atts['ids']) $args['post__in'] = explode(',',$atts['ids']);
    if ($atts['view'] == 'slider') {
        $dataAttr = 'data-slick=\'{"autoplay": true,"autoplaySpeed": 4000,"adaptiveHeight": true,"speed": 2500,"infinite": true,"slidesToShow": '.$atts['column'].', "slidesToScroll": 1, "rows": '.$atts['slider-row'].', "arrows": false,"responsive":[{"breakpoint":991, "settings":{"arrows": false,"dots": true,"slidesToShow": 2}}, {"breakpoint":575, "settings":{"arrows": false,"dots": true,"slidesToShow": 1}}]}\'';
        
    }
    $query = new WP_Query( $args );
	$total_post = $query->post_count;
    //var_dump($query->max_num_pages);
    $logo_image = carbon_get_theme_option( 'mos_portfolio_logo' );    
    $name = carbon_get_theme_option( 'mos_portfolio_name' );    
    $like_image = carbon_get_theme_option( 'mos_portfolio_like' );  
    if ( $query->have_posts() ) : ?>
    <div class="projects-wrapper">
        <div class="projects-items-wrapper view-<?php echo $atts['view'] ?> <?php echo $atts['class'] ?> <?php if ($atts['view'] == 'slider') echo 'slick-slider'; else echo 'row gx-0' ?>" <?php echo $dataAttr?>>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php 
                $id = rand(1000,9999);
                if (has_post_thumbnail()) : 
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                $featured_img_resized = aq_resize($featured_img_url, 613, 460, true);
                $gallery = carbon_get_the_post_meta( 'mos_project_gallery' );
                $follow = carbon_get_the_post_meta( 'mos_project_follow' );
                $like = carbon_get_the_post_meta( 'mos_project_like' );                
                $view = carbon_get_the_post_meta( 'mos_project_view' );
                $tool = carbon_get_the_post_meta( 'mos_project_tool' );
                ?>
                    <div class="portfolio-item-wrapper <?php echo $atts['column'] ?>">
                    <?php if ($atts['template'] == 'advanced') :?>
<!--                    Advanced-->
    <!-- Dialog Contents -->
    <div id="<?php echo get_the_ID()?>" class="dialog-content">
        <div class="item">
            <div class="popup-heading d-flex flex-column flex-md-row gap-3 justify-content-between align-items-start">
                <div class="portfolio-meta d-flex align-items-center gap-3">
                    <?php echo wp_get_attachment_image( $logo_image, 'full', "", array( "class" => "lazy-load-image lazyload popup-top-img img-fluid" ) );  ?>
                    <div class="w-100">
                        <h5 class="templateHeading mb-1"><?php echo get_the_title() ?></h5>
                        <div class="d-flex align-items-center gap-3">
                            <p class="companyName mb-0"><?php echo $name ?></p>
                            <?php if ($follow) : ?>
                            <div class="d-flex align-items-center gap-2">
                                <svg width="3" height="4" viewBox="0 0 3 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.5" cy="2" r="1.5" fill="white"></circle>
                                </svg><a class="followLink" href="<?php echo $follow ?>" target="_blank" rel="noreferrer">Follow</a>
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                </div>

                <div class="popup-body-right d-flex gap-3">
                    <?php if ($tool) :?>
                    <span class="text-center">
                        <?php echo wp_get_attachment_image( $tool, 'full', "", array( "class" => "lazy-load-image lazyload img-fluid" ) );  ?>
                        <p class="rightImageContent mb-0">Tools</p>
                    </span>
                    <?php endif?>
                    <a href="#" class="text-center project-like-inc" data-id="<?php echo get_the_ID() ?>">                        
                        <?php echo wp_get_attachment_image( $like_image, 'full', "", array( "class" => "llazy-load-image lazyload img-fluid" ) );  ?>
                        <p class="rightImageContent mb-0">Appreciate</p>
                    </a>
                </div>                
            </div>
            
            <div class="popup-body-images">
                <?php if ($gallery && sizeof($gallery)) : ?>
                    <?php foreach($gallery as $attachment_id) : ?>
                        <?php echo wp_get_attachment_image( $attachment_id, 'full', "", array( "class" => "llazy-load-image lazyload img-fluid" ) );  ?>
                    <?php endforeach;?>
                <?php endif?>
            </div>
            <div class="popup-footer d-flex align-items-center justify-content-center bg-black">
                <div>
                    <h5 class="popup-footer-heading"><?php echo get_the_title() ?></h5>
                    <div class="popup-footer-icons d-flex align-items-center justify-content-center gap-3">
                        <div class="text-center d-flex align-items-center justify-content-center gap-2"><img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri() ?>/images/like.svg" alt="" width="" height="" loading="lazy">
                            <p class="show-project-like mb-0"><?php echo $like?$like:0 ?></p>
                        </div>
                        <div class="text-center d-flex align-items-center justify-content-center gap-2"><img class="lazy-load-image lazyload " src="<?php echo get_template_directory_uri() ?>/images/preview.svg" alt="" width="" height="" loading="lazy">
                            <p class="show-project-view mb-0"><?php echo $view?$view:0 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      
    <a class="project-view-inc <?php echo $atts['view'] ?>-fancybox-advanced" data-fancybox="dialog" data-src="#<?php echo get_the_ID()?>" data-id=<?php echo get_the_ID() ?>> 
        <div class="portfolio-item portfolio-item-<?php echo get_the_ID() ?>">
            <img class="lazy-load-image lazyload featured-image" src="<?php echo $featured_img_resized?$featured_img_resized:$featured_img_url ?>" alt="<?php echo get_the_title() ?>" width="613px" height="460px" loading="lazy">
            <div class="overlay">
                <div class="icon"></div>
                <span class="portTitle fs-6 fw-bold text-white position-absolute bottom-0 start-0 p-4"><?php echo get_the_title() ?></span>
            </div>
        </div>
    </a> 
                       
                        <?php else : ?>
<!--                        Basic-->
                            <a class="project-view-inc <?php echo $atts['view'] ?>-fancybox" href="<?php echo $featured_img_url ?>" data-fancybox="gallery-<?php echo get_the_ID() ?>-<?php echo $id ?>" data-id=<?php echo get_the_ID() ?>> 
                                <div class="portfolio-item portfolio-item-<?php echo get_the_ID() ?>">
                                    <img class="lazy-load-image lazyload featured-image" src="<?php echo $featured_img_resized?$featured_img_resized:$featured_img_url ?>" alt="<?php echo get_the_title() ?>" width="613px" height="460px" loading="lazy">
                                    <div class="overlay">
                                        <div class="icon"></div>
                                        <span class="portTitle fs-6 fw-bold text-white position-absolute bottom-0 start-0 p-4"><?php echo get_the_title() ?></span>
                                    </div>
                                </div>
                            </a>                
                            <?php if ($gallery && sizeof($gallery)) : ?>
                                <?php foreach($gallery as $attachment_id) : ?>
                                    <a href="<?php echo wp_get_attachment_url($attachment_id) ?>" class="<?php echo $atts['view'] ?>-fancybox d-none"  data-fancybox="gallery-<?php echo get_the_ID() ?>-<?php echo $id ?>"><img src="<?php echo aq_resize(wp_get_attachment_url($attachment_id), 69,64, true) ?>" /></a>
                                <?php endforeach;?>
                            <?php endif?>
                        <?php endif?>
                        
                    </div>
                <?php endif?>
                <?php $n++?>
            <?php endwhile;?>
        </div>        
        <?php if ($atts['view'] == 'block') : ?>
        <div class="pagination-wrapper project-pagination"> 
            <nav class="navigation pagination" role="navigation">
                <div class="nav-links">
                    <input type="hidden" class="data" value='{"tag":"<?php echo $atts['tag'] ?>","category":"<?php echo $atts['category'] ?>", "ids":"<?php echo $atts['ids'] ?>", "limit":"<?php echo $atts['limit'] ?>", "orderby":"<?php echo $atts['orderby'] ?>", "order":"<?php echo $atts['order'] ?>", "column":"<?php echo $atts['column'] ?>", "view":"<?php echo $atts['view'] ?>", "max":"<?php echo $query->max_num_pages ?>", "template":"<?php echo $atts['template'] ?>"}'> 
                    <?php if ($query->max_num_pages>1):?>
                          
                        <span class="page-numbers page-link prev" aria-label="Previous" data-paged="1"><span aria-hidden="true"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.3184 14.94L6.42836 10.05C5.85086 9.4725 5.85086 8.5275 6.42836 7.95L11.3184 3.06" stroke="#6B6E78" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg></span></span>                 
                        <?php for($i = 1; $i<=$query->max_num_pages; $i++) :?>
                            <span class="page-numbers page-link page-numbers-<?php echo $i ?> <?php echo ($i == 1)?'current':'' ?>" data-paged="<?php echo $i; ?>"><?php echo $i; ?></span>
                        <?php endfor;?>
                        <span class="page-numbers page-link next" aria-label="Next" data-paged="2"><span aria-hidden="true"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.68164 14.94L11.5716 10.05C12.1491 9.4725 12.1491 8.5275 11.5716 7.95L6.68164 3.06" stroke="#6B6E78" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg></span></span>
                        
                    <?php endif;?>
                    <?php 
//                    $big = 999999999; // need an unlikely integer
//                    echo paginate_links( array(
//                        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
//                        'format' => '?paged=%#%',
//                        'current' => max( 1, get_query_var('paged') ),
//                        'total' => $query->max_num_pages,
//                        'prev_text'          => __('Prev'),
//                        'next_text'          => __('Next')
//                    ));
                    ?>
                </div>
            </nav>
        </div>
        <?php endif;?>
    </div>
    <?php wp_reset_postdata();?>

<?php else : ?>
<p>No projects found.</p>
<?php endif;?>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'projects', 'projects_func' );

//[jobs class='' count=6 category='' orderby='ID' order='DESC' load-more=1]
function jobs_func( $atts = array(), $content = null ) {
	global $forclient_options;
	$logo_option = (carbon_get_theme_option( 'mos-logo-show' ))?carbon_get_theme_option( 'mos-logo-show' ):'title';
	$html = '';
	$atts = shortcode_atts( array(
		'class'            => '',
		'count'            => 6,
		'category'         => '',
        'orderby'          => 'ID',
		'order'            => 'DESC',
		'load-more'        => 1,        
	), $atts, 'jobs' ); 
    ob_start(); 
    
    $args = array( 
		'post_type' 		=> 'job'
	);
    $args['posts_per_page'] = $atts['count'];
    
    if ($atts['category']) {
        $args['tax_query'][] = array(
                'taxonomy' => 'job_category',
                'field'    => 'term_id',
                'terms'    => $atts['category'],
            );
    }
    $query = new WP_Query( $args );
//    echo '<pre>';
//    var_dump($query);
//    echo '</pre>';
    if ( $query->have_posts() ) :    
    ?>
    <div class="jobs-wrapper <?php echo $atts['class']?>">
        <h6 class="mb-3">All Jobs (<?php echo $query->found_posts ?>)</h6>
        <input type="hidden" class="data" value='{"category":"<?php echo $atts['category'] ?>", "count":"<?php echo $atts['count'] ?>", "orderby":"<?php echo $atts['orderby'] ?>", "order":"<?php echo $atts['order'] ?>", "total":"<?php echo $query->found_posts ?>"}'> 
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php $job_categories = get_the_terms( get_the_ID(), 'job_category' ); ?>
            <div class="job-post-box">
                <div class="content-box">
                    <h4><?php echo get_the_title() ?></h4>
                    <?php if($job_categories && sizeof($job_categories)) : ?> 
                    <div class="tag">
                        <div class="tag-data tag-name"><?php echo $job_categories[0]->name ?></div>
                        <div class="tag-data tag-position"></div>
                    </div>
                    <?php endif?>
                </div>
                <div class="btn-wrapper">
                    <a class="btn position-relative border-0 rounded-pill d-flex align-items-center justify-content-center btn-alt gap-2" href="<?php echo get_the_permalink() ?>">
                        <span>View Position</span>
                        <span class="btn-arrow"></span>
                    </a>
                </div>
            </div>
        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        <?php if($atts['load-more'] && $query->found_posts > $atts['count']) : ?>
        <div class="more-btn mx-auto">
            <span class="gw-btn text-decoration-none d-flex align-items-center justify-content-center">
                <button class="load-more-jobs btn bgClrGreen position-relative text-dark border-0 py-2 px-4 rounded-pill fwSemiBold fs-15 h-sm-52 h-42 gap-2 d-flex align-items-center justify-content-center" data-loaded="<?php echo $atts['count'] ?>">Load More...</button>
            </span>
        </div>
        <?php endif?>
    </div>
    <?php endif?>
    <?php $html = ob_get_clean();	
	return $html;
}
add_shortcode( 'jobs', 'jobs_func' );
//[projects-tab class='' limit='8' column='4']
function projects_tab_func($atts = array(), $content = '') {
	$atts = shortcode_atts( array(
        'class' => '',
        'limit' => 8,
        'column' => 'col-lg-3 col-md-6',
	), $atts, 'projects-tab' );  
    ob_start();
    //project_category
    $categories = mos_get_terms('project_category');
    //var_dump($categories);
    ?>
<div class="projects-tab-wrapper <?php echo $atts['class'] ?>">
    <?php if ($categories && sizeof($categories)) : ?>
    <?php $id = rand(1000, 9999) ?>    
    <ul class="nav justify-content-center" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-<?php echo $id ?>-all-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $id ?>-all" type="button" role="tab" aria-controls="pills-<?php echo $id ?>-all" aria-selected="true">All</a>
        </li>
        <?php foreach($categories as $category): ?>
            <?php if ($category['count']) : ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-<?php echo $id ?>-<?php echo $category['slug'] ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $id ?>-<?php echo $category['slug'] ?>" type="button" role="tab" aria-controls="pills-<?php echo $id ?>-<?php echo $category['slug'] ?>" aria-selected="false" tabindex="-1"><?php echo $category['name'] ?></a>
                </li>
            <?php endif?>
        <?php endforeach;?>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-<?php echo $id ?>-all" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
            <?php echo do_shortcode("[projects limit='".$atts['limit']."' column='".$atts['column']."' view='block' template='advanced']")?>
        </div>
        
        <?php foreach($categories as $category): ?>
            <?php if ($category['count']) : ?>
                <div class="tab-pane fade" id="pills-<?php echo $id ?>-<?php echo $category['slug'] ?>" role="tabpanel" aria-labelledby="pills-<?php echo $id ?>-<?php echo $category['slug'] ?>-tab" tabindex="0">
                    <?php echo do_shortcode("[projects category='".$category['term_id']."' limit='".$atts['limit']."' column='".$atts['column']."' view='block'  template='advanced']") ?>
                </div>
            <?php endif?>
        <?php endforeach;?>
    </div>
    <?php endif?>
</div>
<?php $html = ob_get_clean();
    return $html;
}
add_shortcode( 'projects-tab', 'projects_tab_func' );