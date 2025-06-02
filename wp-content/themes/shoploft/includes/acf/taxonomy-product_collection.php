<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'taxonomy-product_collection',
        'title' => 'Taxonomy product collection',
        'fields' => [
            [
                'key' => 'taxonomy-product_collection-image',
                'name' => 'image_id',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'product_collection',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;