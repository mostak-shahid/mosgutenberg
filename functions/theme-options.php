<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mos_theme_options');
function mos_theme_options() {
    $basic_options_container = Container::make('theme_options', __('Theme Options'))
    ->set_icon('dashicons-admin-customizer')
    ->add_fields(array(
        Field::make('image', 'mos-logo', __('Logo')),
        Field::make('header_scripts', 'crb_header_script', __('Header Script')),
        Field::make('footer_scripts', 'crb_footer_script', __('Footer Script')),
    ));

    Container::make('theme_options', __('Color scheme'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make( 'color', 'mos_body_bg', 'Body Background' )
        //->set_palette( array( '#FF0000', '#00FF00', '#0000FF' ))
        ->set_alpha_enabled( true ),
        Field::make( 'color', 'mos_primary_color', 'Primary Color' ),
        Field::make( 'color', 'mos_secondary_color', 'Secondary Color' ),
        Field::make( 'color', 'mos_link_color', 'Link Color' ),
        Field::make( 'color', 'mos_link_hover_color', 'Link Hover Color' ),
    ));
    Container::make('theme_options', __('Contact Info'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('complex', 'mos-contact-phone', __('Phone'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'number', __('Phone Number')),
        )),
        Field::make('complex', 'mos-contact-email', __('Email'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'email', __('Email Address')),
        )),
        Field::make('complex', 'mos-contact-business-hours', __('Business Hours'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'hours', __('Business Hours')),
        )),
        Field::make('complex', 'mos-contact-contact-address', __('Contact Address'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'address', __('Address')),
            Field::make('text', 'link', __('Map Link')),
        )),
        Field::make('complex', 'mos-contact-social-media', __('Social Media'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('text', 'link', __('Link')),
            Field::make('checkbox', 'new-tab', __('Open in new tab'))
            ->set_option_value('no'),
        )),
    ));
    Container::make('theme_options', __('Back to Top'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-back-to-top', __('Back to top option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-back-to-top-image', __('Back to top image')),
        Field::make('color', 'mos-back-to-top-background', 'Back to top background')
        ->set_alpha_enabled(true),
        Field::make('text', 'mos-back-to-top-class', __('Back to top class')),
    ));
    Container::make('theme_options', __('Page Loader'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('radio', 'mos-page-loader', __('Page loader option'))
        ->set_options(array(
            'on' => 'Enabled',
            'off' => 'Disabled',
        ))
        ->set_default_value(['on']),
        Field::make('image', 'mos-page-loader-image', __('Page loader image')),
        Field::make('color', 'mos-page-loader-background', 'Page loader background')
        ->set_alpha_enabled(true),
        Field::make('text', 'mos-page-loader-class', __('Page loader class')),
    ));

    Container::make('theme_options', __('Header Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-header-padding', __('Padding')),
        Field::make('text', 'mos-header-margin', __('Margin')),
        Field::make('text', 'mos-header-border', __('Border')),
        Field::make('text', 'mos-header-class', __('Class')),
        Field::make('color', 'mos-header-content-color', __('Content Color')),
        Field::make('color', 'mos-header-link-color', __('Links Color')),
        Field::make('color', 'mos-header-link-color-hover', __('Hover Color')),
        Field::make('text', 'mos-header-button-class', __('Button Class')),
        Field::make('complex', 'mos-header-background', __('Background'))
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
            ->set_default_value(['cover']),
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
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));
    Container::make('theme_options', __('Footer Section'))
    ->set_page_parent($basic_options_container) // reference to a top level container
    ->add_fields(array(
        Field::make('text', 'mos-footer-padding', __('Padding')),
        Field::make('text', 'mos-footer-margin', __('Margin')),
        Field::make('text', 'mos-footer-border', __('Border')),
        Field::make('text', 'mos-footer-class', __('Class')),
        Field::make('color', 'mos-footer-content-color', __('Content Color')),
        Field::make('color', 'mos-footer-link-color', __('Links Color')),
        Field::make('color', 'mos-footer-link-color-hover', __('Hover Color')),
        Field::make('text', 'mos-footer-button-class', __('Button Class')),
        Field::make('rich_text', 'mos-footer-content', __('Copyright')),
        Field::make('rich_text', 'footer-desc', __('Widget Intro')),
        Field::make('media_gallery', 'footer_media_gallery', __('Media Gallery'))
        ->set_type(array('image')),
        Field::make('complex', 'mos-footer-background', __('Background'))
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
            ->set_default_value(['cover']),
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
            ->set_default_value(['scroll']),
            Field::make('select', 'background-attachment', __('Background Attachment'))
            ->set_options(array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
            ))
            ->set_default_value(['scroll']),
        )),
    ));
}