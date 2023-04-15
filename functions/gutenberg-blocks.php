<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_gutenberg_blocks');

function mos_gutenberg_blocks() {
    global $animations;
    $animation_options = [''=>'Select Animation'];
    foreach($animations as $key => $value) {
        //echo $key;
        if ($key != 'Back exits' && $key != 'Bouncing exits' && $key != 'Fading exits' && $key != 'Rotating exits' && $key != 'Zooming exits' && $key != 'Sliding exits') {
            foreach($value as $animation) {
                $animation_options[$animation] = $animation;
            }
        }
    }
    /*
    //Base Block start
    Block::make(__('Base Block'))
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_block_title', __('Title')),
    ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_block_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_block_title_class', __('Title Class')),
        Field::make('complex', 'mos_block_background', __('Background'))
        ->set_max(1)
        ->set_collapsed(true)
        ->add_fields(array(
            Field::make('color', 'background-color', __('Background Color')),
            Field::make('image', 'background-image', __('Background Image')),
            Field::make('select', 'background-position', __('Background Position'))
            ->set_options(array(
                'top left' => 'Top Left',
                'top center' => 'Top Center',
                'top right' => 'Top Right',
                'center left' => 'Center Left',
                'center center' => 'Center Center',
                'center right' => 'Center Right',
                'bottom left' => 'Bottom left',
                'bottom center' => 'Bottom Center',
                'bottom right' => 'Bottom Right',
            ))
            ->set_default_value(['top left']),
            Field::make('select', 'background-size', __('Background Size'))
            ->set_options(array(
                'cover' => 'cover',
                'contain' => 'contain',
                'auto' => 'auto',
                'inherit' => 'inherit',
                'initial' => 'initial',
                'revert' => 'revert',
                'revert-layer' => 'revert-layer',
                'unset' => 'unset',
            ))
            ->set_default_value('cover'),
            //background-repeat: repeat|repeat-x|repeat-y|no-repeat|initial|inherit;
            Field::make('select', 'background-repeat', __('Background Repeat'))
            ->set_options(array(
                'repeat' => 'repeat',
                'repeat-x' => 'repeat-x',
                'repeat-y' => 'repeat-y',
                'no-repeat' => 'no-repeat',
                'initial' => 'initial',
                'inherit' => 'inherit',
            ))
            ->set_default_value('repeat'),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value('scroll'),
        )),
    )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_block_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_block_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
    ))  
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {        
        $id = 'element-'.time().rand(1000, 9999);
    ?>
        <div id="<?php echo $id ?>" class="mos-block-wrapper <?php echo @$fields['mos_block_wrapper_class']; ?> <?php echo @$attributes['className']; ?>"> 
        <div class="title <?php echo @$fields['mos_block_title_class']; ?>"><?php echo $fields['mos_block_title'] ?></div>
        </div>        
        <?php if(@$fields['mos_block_style']) : ?>
        <style><?php echo str_replace("selector",'#'.$id,$fields['mos_block_style']); ?></style>
        <?php endif?>
        
        <style>            
            <?php echo '#'.$id ?> {
                <?php if (@$fields['mos_block_background'][0]['background-color']) : ?>
                    background-color: <?php echo $fields['mos_block_background'][0]['background-color'] ?>;
                <?php endif?>
                <?php if (@$fields['mos_block_background'][0]['background-image']) : ?>
                    background-image: url(<?php echo wp_get_attachment_url($fields['mos_block_background'][0]['background-image']) ?>);
                <?php endif?>
                <?php if (@$fields['mos_block_background'][0]['background-position']) : ?>
                    background-position: <?php echo $fields['mos_block_background'][0]['background-position'] ?>;
                <?php endif?>
                <?php if (@$fields['mos_block_background'][0]['background-size']) : ?>
                    background-size: <?php echo $fields['mos_block_background'][0]['background-size'] ?>;
                <?php endif?>
                <?php if (@$fields['mos_block_background'][0]['background-repeat']) : ?>
                    background-repeat: <?php echo $fields['mos_block_background'][0]['background-repeat'] ?>;
                <?php endif?>
                <?php if (@$fields['mos_block_background'][0]['background-attachment']) : ?>
                    background-attachment: <?php echo $fields['mos_block_background'][0]['background-attachment'] ?>;
                <?php endif?>
            }
        </style>
        <?php if(@$fields['mos_block_script']) : ?>
        <script><?php echo $fields['mos_block_script']; ?></script>
        <?php endif?>
    <?php
    }); 
    //Base Block end
    */
    
    //Section Title Block start
    Block::make(__('Section Title Block'))    
    ->add_tab( __( 'Scripts' ), array(
        Field::make('textarea', 'mos_sec_style', __('Style'))
        ->set_help_text( 'Please write your custom css without style tag, you can target the parent element with "selector" tag' )
        ->set_classes('css-editor'),
        Field::make('textarea', 'mos_sec_script', __('Script'))
        ->set_help_text( 'Please write your custom script without script tag' )        
        ->set_classes('js-editor'),
    )) 
    ->add_tab( __( 'Content' ), array(
        Field::make('text', 'mos_sec_subtitle', __('Sub Title')),
        Field::make('text', 'mos_sec_title', __('Main Title')),
        Field::make('textarea', 'mos_sec_desc', __('Intro')),
        Field::make('text', 'mos_sec_button_title', __('Button Title')),
        Field::make('text', 'mos_sec_button_url', __('Button URL')),
        Field::make( 'image', 'mos_sec_image', __( 'Image' ) ),
    ))
    ->add_tab( __( 'Style' ), array(
        Field::make( 'select', 'mos_sec_text_align', __( 'Text Alignment' ) )
        ->set_options( array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
        )),
        Field::make('text', 'mos_sec_class', __('Section Class')),
        Field::make('text', 'mos_sec_subtitle_class', __('Sub Title Class')),
        Field::make('text', 'mos_sec_title_class', __('Main Title Class')),
        Field::make('text', 'mos_sec_intro_class', __('Intro Class')),
        Field::make('text', 'mos_sec_button_class', __('Button Class')),
        Field::make('text', 'mos_sec_image_class', __('Button Class')),
    ))
    ->add_tab( __( 'Animation' ), array(
        
        Field::make( 'separator', 'mos_sec_subtitle_animation_separator', __( 'Sub Title' ) ),
        Field::make( 'select', 'mos_sec_subtitle_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_title_animation_separator', __( 'Main Title' ) ),
        Field::make( 'select', 'mos_sec_title_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_desc_animation_separator', __( 'Intro' ) ),
        Field::make( 'select', 'mos_sec_desc_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_desc_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_btn_animation_separator', __( 'Button' ) ),
        Field::make( 'select', 'mos_sec_btn_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_btn_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_image_animation_separator', __( 'Image' ) ),
        Field::make( 'select', 'mos_sec_image_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_image_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
    ))       
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
    ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        $id = 'element-'.time().rand(1000, 9999);
        ?>
<div id="<?php echo $id ?>" class="section-heading <?php echo @$fields['mos_sec_text_align']; ?> <?php echo @$fields['mos_sec_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="text-part">
    <?php if(@$fields['mos_sec_subtitle']) : ?><h6 class="sub-title <?php echo @$fields['mos_sec_subtitle_class']; ?> wow <?php echo @$fields['mos_sec_subtitle_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_subtitle_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_subtitle']); ?></h6><?php endif?>
    
    <?php if(@$fields['mos_sec_title']) : ?><h2 class="title <?php echo @$fields['mos_sec_title_class']; ?> wow <?php echo @$fields['mos_sec_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_title_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_title']); ?></h2><?php endif?>
    
    <?php if(@$fields['mos_sec_desc']) : ?><div class="intro <?php echo @$fields['mos_sec_intro_class']; ?> wow <?php echo @$fields['mos_sec_desc_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_desc_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_desc']); ?></div><?php endif?>
    
    <?php if(@$fields['mos_sec_button_title'] && @$fields['mos_sec_button_url']) : ?>
    <div class="common-btn <?php echo @$fields['mos_sec_button_class']; ?> wow <?php echo @$fields['mos_sec_button_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_button_animation_delay'] ?>ms">
        <a href="<?php echo do_shortcode($fields['mos_sec_button_url'])?>" class="fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 d-inline-flex align-items-center gap-2">
            <span><?php echo do_shortcode($fields['mos_sec_button_title'])?></span>
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#002448"></path>
                </svg>
            </span>
        </a>
    </div>
    <?php endif?>
    </div>    
    <?php if(@$fields['mos_sec_image']) : ?>
        <div class="img-part <?php echo @$fields['mos_sec_image_class']; ?> wow <?php echo @$fields['mos_sec_image_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_image_animation_delay'] ?>ms">
            <?php echo wp_get_attachment_image( $fields['mos_sec_image'], "full", "", array( "class" => "img-fluid" ) );  ?>
        </div>
    <?php endif?>   
</div>
<?php if(@$fields['mos_sec_style']) : ?>
<style><?php echo str_replace("selector",'#'.$id,$fields['mos_sec_style']); ?></style>
<?php endif?>
<?php if(@$fields['mos_sec_script']) : ?>
<script><?php echo $fields['mos_sec_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Section Title Block end
}