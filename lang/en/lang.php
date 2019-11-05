<?php
    return [
        'plugin' => [
            'name'        => 'Gallery',
            'description' => 'Simple admin UI for managing and sorting galleries',
            'permission' => 'Manage Galleries'
        ],
        'form' => [
            'label' => 'Select one or more galleries for attach to the post ',
            'tab' => 'Galleries'
        ],
        'gallerycomponent' => [
            'name' => 'Gallery',
            'description' => 'Displays a gallery on the page, specifying the gallery name or using url slug parameter',
            'property' =>[
                'gallery' => 'Select the gallery',
                'galleryDescription' => 'Select a specific gallery or retrieve dinamically using the slug gallery',
                'gallerySlug' => 'Use gallery slug',
                'slug' => 'Gallery slug',
                'slugDescription' => ''
            ]
        ],
        'galleriescomponent' =>[
            'name' => 'Galleries',
            'description' => 'Display a list of galleries',
            'property' => [
                'order' => 'Gallery order',
                'orderDescription' => 'Attribute in wich the galleries should be orderer',
                'orderIddesc' => 'Newers first',
                'orderIdasc' => 'Newers last',
                'orderNamedesc' => 'By name, desc',
                'orderNameasc' => 'By name, asc',
                'orderRandom' => 'Randomize',
                'results' => 'Results per page',
                'page' => 'Gallery page',
                'pageDescription' => 'Page where a single gallery will be displayed. This attribute is used for create a link to the gallery',
            ]
        ],
        'column' => [
            'name' => 'Gallery name',
            'description' => 'Description',
            'created' => 'Created',
            'images' => 'Drag and drop your images here'
        ]
    ];
