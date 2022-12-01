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
    Block::make(__('Section Title Block'))
    ->add_tab( __( 'Content' ), array(
        Field::make('text', 'mos_sec_subtitle', __('Sub Title')),
        Field::make('text', 'mos_sec_title', __('Main Title')),
        Field::make('textarea', 'mos_sec_desc', __('Intro')),
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
    ))
    ->add_tab( __( 'Animation' ), array(
        Field::make( 'separator', 'mos_sec_title_animation_separator', __( 'Main Title' ) ),
        Field::make( 'select', 'mos_sec_title_animation_option', __( 'Text alignment' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_title_animation_delay', __('Animation Delay'))
        ->set_default_value(['0ms'])
        ->set_help_text( 'Please add animation delay with ' ),
        
        Field::make( 'separator', 'mos_sec_subtitle_animation_separator', __( 'Sub Title' ) ),
        Field::make( 'select', 'mos_sec_subtitle_animation_option', __( 'Text alignment' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value(['0ms'])
        ->set_help_text( 'Please add animation delay with ' ),
        
        Field::make( 'separator', 'mos_sec_desc_animation_separator', __( 'Intro' ) ),
        Field::make( 'select', 'mos_sec_desc_animation_option', __( 'Text alignment' ) )
        ->add_options( $animation_options),
        Field::make('text', 'mos_sec_desc_animation_delay', __('Animation Delay'))
        ->set_default_value(['0ms'])
        ->set_help_text( 'Please add animation delay with ' ),
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
<div class="section-heading <?php echo @$fields['mos_sec_text_align']; ?>  <?php echo @$fields['mos_sec_class']; ?>">
    <?php if(@$fields['mos_sec_subtitle']) : ?><h6 class="sub-title fs-18 fw-semi-bold text-lapis_lazuli bg-lapis_lazuli_light radius-4 d-inline-block wow <?php echo @$fields['mos_sec_subtitle_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_subtitle_animation_delay'] ?>"><?php echo do_shortcode($fields['mos_sec_subtitle']); ?></h6><?php endif?>
    
    <?php if(@$fields['mos_sec_subtitle']) : ?><h2 class="fs-48 fw-bold text-gray_1 mt-2 mb-3 wow <?php echo @$fields['mos_sec_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_subtitle_animation_delay'] ?>"><?php echo do_shortcode($fields['mos_sec_title']); ?></h2><?php endif?>
    
    <?php if(@$fields['mos_sec_desc']) : ?><div class="fs-18 text-gray_2 wow <?php echo @$fields['mos_sec_desc_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_desc_animation_delay'] ?>"><?php echo do_shortcode($fields['mos_sec_desc']); ?></div><?php endif?>
</div>
<?php if(@$fields['mos_sec_style']) : ?>
<style><?php echo $fields['mos_sec_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_sec_script']) : ?>
<script><?php echo $fields['mos_sec_script']; ?></script>
<?php endif?>
        <?php
    });    
}