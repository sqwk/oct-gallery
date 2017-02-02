<?php
    return [
        'plugin' => [
            'name'        => 'Simple Awesome Gallery',
            'description' => 'Gallería con integración al Blog de RainLab',
            'permission' => 'Manage Galleries in a easy way'
        ],
        'form' => [
            'label' => 'Selecciona una o más galaerías para integrarlas a la publicación',
            'tab' => 'Galerías'
        ],
        'gallerycomponent' => [
            'name' => 'Galería',
            'description' => 'Muestra una galería en la página especificando el nombre de la galería o utilizando el parámetro slug',
            'property' =>[
                'gallery' => 'Selecciona la galería',
                'galleryDescription' => 'Selcciona una galería en especifico u obtenla dinámicamente utilizando el slug de la galería',
                'gallerySlug' => 'Usar el slug de la galería',
                'style' => 'Estilo de la galería',
                'styleComponent' => 'Usar el estilo incluido en el componente',
                'styleUser' => 'Usar un estilo creado por el usuario',
                'styleDescription' => 'El estilo incluido en el componente usa Owl Carousel para crear un slide con las imágenes de la galería',
                'slug' => 'Slug de la galería',
                'slugDescription' => ''
            ]
        ],
        'galleriescomponent' =>[
            'name' => 'Lista de galerías',
            'description' => 'Muestra una lista de todas las galerías disponibles',
            'property' => [
                'order' => 'Ordenar las galerías',
                'orderDescription' => 'Atributo usado para order las galerías',
                'orderIddesc' => 'Las más nuevas primero',
                'orderIdasc' => 'Las nuevas al final',
                'orderNamedesc' => 'Por nombre, desc',
                'orderNameasc' => 'Por nombre, asc',
                'orderRandom' => 'Orden aleatorio',
                'results' => 'Resultados por página',
                'page' => 'Pagina de la galería',
                'pageDescription' => 'Página en la que una galería es mostrada. Este atributo se usa para crear una liga a la galería.'
            ]
        ],
        'column' => [
            'name' => 'Nombre de la galería',
            'description' => 'Descripción',
            'created' => 'Creada',
            'images' => 'Arrastra y suelta las imágenes aquí'
        ]
    ];
?>