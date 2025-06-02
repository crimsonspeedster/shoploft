<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'template-home',
        'title' => 'Home page',
        'fields' => [
            [
                'key' => 'template-home_tab-hero',
                'label' => 'Hero',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_hero-slider',
                'label' => 'Slider',
                'name' => 'hero__slider',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-home_hero-slider_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_hero-slider_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                        'required' => 0,
                    ],
                    [
                        'key' => 'template-home_hero-slider_image',
                        'name' => 'image_id',
                        'label' => 'Image Background',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_hero-slider_products',
                        'label' => 'Select products',
                        'name' => 'products_array',
                        'type' => 'post_object',
                        'post_type' => ['product'],
                        'multiple' => true,
                        'return_format' => 'object',
                        'required' => 0,
                        'allow_null' => 1,
                    ],
                ],
            ],
            [
                'key' => 'template-home_tab-popular',
                'label' => 'Popular',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_popular-condition',
                'label' => 'Enable block?',
                'name' => 'popular__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_popular-title',
                'name' => 'popular__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_popular-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_popular-link',
                'name' => 'popular__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_popular-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_popular-slider',
                'label' => 'Slider',
                'name' => 'popular__slider',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-home_popular-slider_image',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_popular-slider_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_popular-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-portfolio',
                'label' => 'Portfolio',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_portfolio-condition',
                'label' => 'Enable block?',
                'name' => 'portfolio__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_portfolio-slider',
                'label' => 'Slider',
                'name' => 'portfolio__slider',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-home_portfolio-slider_image',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_portfolio-slider_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_portfolio-slider_description',
                        'name' => 'description',
                        'label' => 'Description',
                        'type' => 'textarea',
                        'required' => 0,
                    ],
                    [
                        'key' => 'template-home_portfolio-slider_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_portfolio-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-sale',
                'label' => 'Sale',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_sale-condition',
                'label' => 'Enable block?',
                'name' => 'sale__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_sale-title',
                'name' => 'sale__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_sale-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_sale-link',
                'name' => 'sale__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_sale-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_sale-products',
                'label' => 'Select products',
                'name' => 'sale__products',
                'type' => 'post_object',
                'post_type' => ['product'],
                'multiple' => true,
                'return_format' => 'object',
                'required' => 1,
                'allow_null' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_sale-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-media',
                'label' => 'Media',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_media-condition',
                'label' => 'Enable block?',
                'name' => 'media__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_media-title',
                'name' => 'media__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_media-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_media-description',
                'name' => 'media__description',
                'label' => 'Description',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_media-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_media-image',
                'name' => 'media__image_id',
                'label' => 'Background',
                'type' => 'image',
                'return_format' => 'id',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_media-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_media-repeater',
                'label' => 'Repeater',
                'name' => 'media__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 3,
                'sub_fields' => [
                    [
                        'key' => 'template-home_media-repeater_title',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'textarea',
                        'new_lines' => 'br',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_media-repeater_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_media-repeater_bg',
                        'name' => 'bg_id',
                        'label' => 'Background',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_media-repeater_icon',
                        'name' => 'icon_id',
                        'label' => 'Icon',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_media-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-collections',
                'label' => 'Collections',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_collections-condition',
                'label' => 'Enable block?',
                'name' => 'collections__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_collections-title',
                'name' => 'collections__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_collections-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_collections-link',
                'name' => 'collections__link',
                'label' => 'Link',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_collections-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_collections-repeater',
                'label' => 'Collections repeater',
                'name' => 'collections__repeater',
                'type' => 'taxonomy',
                'required' => 1,
                'taxonomy' => 'product_collection',
                'field_type' => 'multi_select',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_collections-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-to_order',
                'label' => 'To order',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_to_order-condition',
                'label' => 'Enable block?',
                'name' => 'to_order__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_to_order-title',
                'name' => 'to_order__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_to_order-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_to_order-slider',
                'label' => 'Slider',
                'name' => 'to_order__slider',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'template-home_to_order-slider_image',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 1,
                    ],
                    [
                        'key' => 'template-home_to_order-slider_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_to_order-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_tab-seo',
                'label' => 'Seo',
                'type' => 'tab',
            ],
            [
                'key' => 'template-home_seo-condition',
                'label' => 'Enable block?',
                'name' => 'seo__condition',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
            ],
            [
                'key' => 'template-home_seo-title',
                'name' => 'seo__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_seo-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_seo-description--short',
                'name' => 'seo__description_short',
                'label' => 'Description (short)',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_seo-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
            [
                'key' => 'template-home_seo-description--big',
                'name' => 'seo__description_big',
                'label' => 'Description (big)',
                'type' => 'wysiwyg',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'template-home_seo-condition',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_templates/home.php',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;