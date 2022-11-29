<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_gutenberg_blocks');

function mos_gutenberg_blocks() {
// Section title block start
    Block::make(__('Section Title Block'))
            ->add_fields(array(
                Field::make('text', 'mos_sec_heading', __('Section Name')),
                Field::make('text', 'mos_sec_title', __('Section TagLine')),
                Field::make('text', 'mos_sec_desc', __('Section Intro')),
            ))
            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                ?>

<div class="title-wrapper">
    <div class="container-lg">
        <div class="wrapper">
            <div class="secTagLine"><?php echo ( $fields['mos_sec_heading'] ); ?></div>
            <div class="secIntro">
                <h2><?php echo ( $fields['mos_sec_title'] ); ?></h2>
                <p><?php echo ( $fields['mos_sec_desc'] ); ?></p>
            </div>
        </div>
    </div>
</div>

                <?php
            });    
}