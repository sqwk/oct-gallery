<?php

    return [
        'plugin' => [
            'name'        => 'Simple Awesome Gallery',
            'description' => 'Gallery associated to RainLab Blog',
            'permission' => 'Manage Galleries in a easy way'
        ],
        'form' => [
            'label' => 'Select one or more galleries for attach to the post ',
            'tab' => 'Galleries'
        ],
        'simplecomponent' => [
            'name' => 'Gallery',
            'description' => 'Displays a gallery on the page, specifying the gallery name or using url slug parameter'
        ],
        'listcomponent' =>[
            'name' => 'Galleries',
            'description' => 'Display a list of the galleries'
        ],
        'property' =>[
            'title' => 'Select the gallery',
            'titleDescription' => 'Select a specific gallery or retrieve dinamically using the slug gallery',
            'markuptitle' => 'Gallery style to display',
            'markupdefault' => 'Use the style included in the component',
            'markupuser' => 'Use style created by the user',
            'slug' => 'Galery Slug'
        ],
        'column' => [
            'name' => 'Gallery name',
            'description' => 'Description',
            'created' => 'Created',
            'images' => 'Images'
        ]
    ];
?>