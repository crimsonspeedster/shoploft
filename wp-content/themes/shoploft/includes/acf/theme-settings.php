<?php

if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'acf_theme_settings',
        'title' => 'Theme settings',
        'fields' => [
            [
                'key' => 'acf_theme_settings-tab-common',
                'label' => 'Common',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'acf_theme_settings_common-logo',
                'name' => 'common__logo',
                'label' => 'Logo',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
            [
                'key' => 'acf_theme_settings-tab-product',
                'label' => 'Product',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'acf_theme_settings_product-delivery_tab',
                'name' => 'product__delivery_tab',
                'label' => 'Product delivery tab',
                'type' => 'wysiwyg',
                'required' => 0,
            ],
            [
                'key' => 'acf_theme_settings_product-telegram',
                'name' => 'product__telegram',
                'label' => 'Buy in telegram',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
            ],
            [
                'key' => 'acf_theme_settings-tab-error',
                'label' => '404',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'acf_theme_settings_error-image',
                'name' => 'error__image',
                'label' => 'Image',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
            ],
            [
                'key' => 'acf_theme_settings_error-description',
                'name' => 'error__description',
                'label' => 'Description',
                'type' => 'textarea',
                'new_lines' => 'br',
                'required' => 0,
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}