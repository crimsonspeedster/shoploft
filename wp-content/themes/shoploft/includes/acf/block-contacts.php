<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'block-contacts',
        'title' => 'Contacts',
        'fields' => [
            [
                'key' => 'block-contacts_title',
                'name' => 'block_contacts__title',
                'label' => 'Title',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'key' => 'block-contacts-repeater',
                'label' => 'Repeater',
                'name' => 'block_contacts__repeater',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'table',
                'min' => 1,
                'max' => 0,
                'sub_fields' => [
                    [
                        'key' => 'block-contacts-repeater_logo',
                        'name' => 'image_id',
                        'label' => 'Image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'required' => 0,
                    ],
                    [
                        'key' => 'block-contacts-repeater_condition',
                        'label' => 'Is link?',
                        'name' => 'is_link',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                    ],
                    [
                        'key' => 'block-contacts-repeater_text',
                        'name' => 'title',
                        'label' => 'Title',
                        'type' => 'text',
                        'required' => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'block-contacts-repeater_condition',
                                    'operator' => '==',
                                    'value' => '0',
                                ),
                            ),
                        ),
                    ],
                    [
                        'key' => 'block-contacts-repeater_link',
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'block-contacts-repeater_condition',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                    ],
                ],
            ],
        ],
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/contacts',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'label_placement' => 'top',
        'active' => true,
    ));

endif;