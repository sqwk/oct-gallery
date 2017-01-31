<?php

    return [
        'plugin' => [
            'name'        => 'Simple Awesome Gallery',
            'description' => 'Galeria asociada al Blog de RainLab',
            'permission' => 'Administrar galerías de forma fácil'
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
        ],
        'column' => [
            'name' => 'Nombre de la galería',
            'description' => 'Descripción adicional',
            'created' => 'Fecha de creación',
            'images' => 'Imágenes'
        ]
    ];
?>