<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-banner',
        'title' => 'Banner',
        'fields' => [
            [
                'key' => 'block-banner_image',
                'name' => 'image_id',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
            [
                'key' => 'block-banner_link',
                'name' => 'link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 1,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/banner',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;