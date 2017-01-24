<?php

    return [
        'plugin' => [
            'name'        => 'Simple Awesome Gallery',
            'description' => 'Gallery associated to RainLab Blog',
        ],

        'form' => [
            'label' => 'Select one or more galleries for attach to the post ',
            'tab' => 'Galleries'
        ],
        'simplecomponent' => [
            'name' => 'Simple Gallery',
            'description' => 'List all the images from the selected gallery without slide show or lightbox'
        ],
        'property' =>[
            'title' => 'Select the gallery',
            'markuptitle' => 'Gallery style to display',
            'markupdefault' => 'Use the style included in the component',
            'markupuser' => 'Use style created by the user'
        ]

    ];

?>