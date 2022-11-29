<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_post_meta_options');

function mos_post_meta_options() {
    Container::make('post_meta', 'Audio Data')
    ->where('post_type', '=', 'post')
    ->add_fields(array(
        Field::make( 'select', 'mos_blog_details_audio_option', __( 'Audio Source' ) )
        ->set_options( array(
            'none' => 'No Audio',
            'ga' => 'Given Audio',
        )),
        Field::make('file', 'mos_blog_details_audio', __('Audio File'))
        ->set_type(array( 'audio' ))
    ));
}