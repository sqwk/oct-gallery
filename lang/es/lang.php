<?php
return [
    "column" => [
        "created" => "Creada",
        "description" => "Descripción",
        "images" => "Arrastra y suelta las imágenes aquí",
        "name" => "Nombre de la galería"
    ],
    "form" => [
        "label" => "Selecciona una o más galaerías para integrarlas a la publicación",
        "tab" => "Galerías"
    ],
    "galleriescomponent" => [
        "description" => "Muestra una lista de todas las galerías disponibles",
        "name" => "Lista de galerías",
        "property" => [
            "order" => "Ordenar las galerías",
            "orderDescription" => "Atributo usado para order las galerías",
            "orderIdasc" => "Las nuevas al final",
            "orderIddesc" => "Las más nuevas primero",
            "orderNameasc" => "Por nombre, asc",
            "orderNamedesc" => "Por nombre, desc",
            "orderRandom" => "Orden aleatorio",
            "page" => "Pagina de la galería",
            "pageDescription" => "Página en la que una galería es mostrada. Este atributo se usa para crear una liga a la galería.",
            "results" => "Resultados por página"
        ]
    ],
    "gallerycomponent" => [
        "description" => "Muestra una galería",
        "name" => "Galería",
        "property" => [
            "gallery" => "Selecciona la galería",
            "galleryDescription" => "Selcciona una galería en especifico u obtenla dinámicamente utilizando el slug de la galería",
            "gallerySlug" => "Usar el slug de la galería",
            "maxDimension" => "Max Dimension",
            "maxDimensionDescription" => "The length of the longest side of images if Image Resizer is installed",
            "slug" => "Slug de la galería",
            "slugDescription" => "Esta es la parte de la url para recuperar la galería"
        ]
    ],
    "plugin" => [
        "description" => "Simple admin UI for managing and sorting galleries",
        "name" => "Gallery",
        "permission" => "Manejar gallerías"
    ],
    "sidemenu" => ["galleries" => "Galleries"]
];
