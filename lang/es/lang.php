<?php

    return [
        'plugin' => [
            'name'        => 'Simple Awesome Gallery',
            'description' => 'Galeria asociada al Blog de RainLab',
        ],

        'form' => [
            'label' => 'Selecciona una o más galaerías para integrarlas al post',
            'tab' => 'Galerías'
        ],
        'simplecomponent' => [
            'name' => 'Galería Simple',
            'description' => 'Lista las imágenes disponibles en la galería sin slide ni lightbox'
        ],
        'property' =>[
            'title' => 'Selecciona la galería',
            'markuptitle' => 'Estilo de galería a usar',
            'markupdefault' => 'Usar el estilo incluido en el componente',
            'markupuser' => 'Usar el estilo creado por el usuario'
        ]

    ];

?>