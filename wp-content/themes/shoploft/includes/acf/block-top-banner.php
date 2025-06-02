<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-top-banner',
        'title' => 'Banner',
        'fields' => [
            [
                'key' => 'block-top-banner_title',
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'key' => 'block-top-banner_background',
                'label' => 'Background color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'default_value' => '#f7b71d',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/top-banner',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;