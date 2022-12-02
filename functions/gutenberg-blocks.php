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
    
    //Section Title Block start
    Block::make(__('Section Title Block'))
    ->add_tab( __( 'Content' ), array(
        Field::make('text', 'mos_sec_subtitle', __('Sub Title')),
        Field::make('text', 'mos_sec_title', __('Main Title')),
        Field::make('textarea', 'mos_sec_desc', __('Intro')),
        Field::make('text', 'mos_sec_button_title', __('Button Title')),
        Field::make('text', 'mos_sec_button_url', __('Button URL')),
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
    ))
    ->add_tab( __( 'Animation' ), array(
        Field::make( 'separator', 'mos_sec_title_animation_separator', __( 'Main Title' ) ),
        Field::make( 'select', 'mos_sec_title_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_subtitle_animation_separator', __( 'Sub Title' ) ),
        Field::make( 'select', 'mos_sec_subtitle_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_desc_animation_separator', __( 'Intro' ) ),
        Field::make( 'select', 'mos_sec_desc_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_desc_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
        
        Field::make( 'separator', 'mos_sec_btn_animation_separator', __( 'Intro' ) ),
        Field::make( 'select', 'mos_sec_btn_animation_option', __( 'Animation' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_btn_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text( 'Please add animation delay, unit will be ms.' ),
    ))  
    ->add_tab( __( 'Advanced' ), array(
        Field::make('textarea', 'mos_sec_style', __('Style'))
        ->set_help_text( 'Please write your custom css without style tag' ),
        Field::make('textarea', 'mos_sec_script', __('Script'))
        ->set_help_text( 'Please write your custom script without script tag' ),
    ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
    ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        ?>
<div class="section-heading <?php echo @$fields['mos_sec_text_align']; ?> <?php echo @$fields['mos_sec_class']; ?> <?php echo @$attributes['className']; ?>">
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
<?php if(@$fields['mos_sec_style']) : ?>
<style><?php echo $fields['mos_sec_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_sec_script']) : ?>
<script><?php echo $fields['mos_sec_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Section Title Block end
}