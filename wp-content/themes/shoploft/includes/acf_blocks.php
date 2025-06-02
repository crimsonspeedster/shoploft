<?php

add_filter('block_categories_all', function ($categories) {
    return array_merge(
        array(
            array(
                'slug' => 'shoploft',
                'title' => 'Shoploft',
            ),
        ),
        $categories,
    );
});

if (function_exists('acf_register_block_type')) {
    $blocks_path = get_template_directory() . '/includes/acf_blocks';
    $blocks_path_uri = get_template_directory_uri() . '/includes/acf_blocks';

    acf_register_block_type(array(
        'name'              => 'banner',
        'title'             => 'Banner',
        'description'       => 'Banner',
        'render_template'   => $blocks_path . '/banner/render.php',
        'category'          => 'shoploft',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/banner/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'top-banner',
        'title'             => 'Top Banner',
        'description'       => 'Top Banner',
        'render_template'   => $blocks_path . '/top-banner/render.php',
        'category'          => 'shoploft',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/top-banner/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'contacts',
        'title'             => 'Contacts',
        'description'       => 'Contacts',
        'render_template'   => $blocks_path . '/contacts/render.php',
        'category'          => 'shoploft',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/contacts/image.png'
                )
            )
        ),
    ));

    acf_register_block_type(array(
        'name'              => 'navigation',
        'title'             => 'Navigation',
        'description'       => 'Navigation',
        'render_template'   => $blocks_path . '/navigation/render.php',
        'category'          => 'shoploft',
        'icon'              => 'admin-comments',
        'mode'              => 'edit',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'is_preview' => true,
                    'preview_image' => $blocks_path_uri . '/navigation/image.png'
                )
            )
        ),
    ));
}