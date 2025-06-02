<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-navigation',
        'title' => 'Navigation',
        'fields' => [
            [
                'key' => 'block-navigation_logo',
                'name' => 'logo_id',
                'label' => 'Logo',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
            [
                'key' => 'block-navigation-catalog',
                'label' => 'Catalog menu',
                'name' => 'catalog_menu',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-navigation-catalog_term--main',
                        'label' => 'Main term',
                        'name' => 'main_term',
                        'type' => 'taxonomy',
                        'required' => 1,
                        'taxonomy' => 'product_cat',
                        'field_type' => 'select',
                        'allow_null' => 0,
                        'add_term' => 0,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'return_format' => 'object',
                        'multiple' => 0,
                    ],
                    [
                        'key' => 'block-navigation-catalog_term--children',
                        'label' => 'Children terms',
                        'name' => 'children_terms',
                        'type' => 'taxonomy',
                        'required' => 1,
                        'taxonomy' => 'product_cat',
                        'field_type' => 'multi_select',
                        'allow_null' => 0,
                        'add_term' => 0,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'return_format' => 'object',
                        'multiple' => 1,
                    ],
                ],
            ],
            [
                'key' => 'block-navigation_menu',
                'label' => 'Default menu',
                'name' => 'default_menu',
                'type' => 'select',
                'choices' => [],
                'allow_null' => 1,
                'multiple' => 0,
                'required' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/navigation',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;