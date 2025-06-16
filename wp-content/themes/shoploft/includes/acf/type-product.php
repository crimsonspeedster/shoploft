<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'type-product',
        'title' => 'Product ACF',
        'fields' => [
            [
                'key' => 'type-product_votes',
                'name' => 'product__votes',
                'label' => 'Votes total',
                'type' => 'number',
                'min' => 0,
                'default_value' => 0,
                'required' => 0,
            ],
            [
                'key' => 'type-product_total',
                'name' => 'product__rating',
                'label' => 'Rating total',
                'type' => 'number',
                'min' => 0,
                'max' => 5,
                'default_value' => 0,
                'required' => 0,
            ],
            [
                'key' => 'type-product_image--hover',
                'name' => 'product__image_for_hover',
                'label' => 'Image for product hover',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;