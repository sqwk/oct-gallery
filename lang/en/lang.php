<?php
return [
    "column" => [
        "created" => "Created",
        "description" => "Description",
        "images" => "Drag and drop your images here",
        "name" => "Gallery name"
    ],
    "form" => [
        "label" => "Select one or more galleries for attach to the post ",
        "tab" => "Galleries"
    ],
    "galleriescomponent" => [
        "description" => "Display a list of all available galleries",
        "name" => "Galleries",
        "property" => [
            "order" => "Gallery order",
            "orderDescription" => "Attribute in wich the galleries should be orderer",
            "orderIdasc" => "Newers last",
            "orderIddesc" => "Newers first",
            "orderNameasc" => "By name, asc",
            "orderNamedesc" => "By name, desc",
            "orderRandom" => "Randomize",
            "page" => "Gallery page",
            "pageDescription" => "Page where a single gallery will be displayed. This attribute is used for create a link to the gallery",
            "results" => "Results per page"
        ]
    ],
    "gallerycomponent" => [
        "description" => "Display a single gallery.",
        "name" => "Gallery",
        "property" => [
            "gallery" => "Select the gallery",
            "galleryDescription" => "Select a specific gallery or retrieve dinamically using the slug gallery",
            "gallerySlug" => "Use gallery slug",
            "maxDimension" => "Max Dimension",
            "maxDimensionDescription" => "The length of the longest side of images if Image Resizer is installed",
            "slug" => "Gallery slug",
            "slugDescription" => "This is the part of the url alias to retrieve the gallery"
        ]
    ],
    "plugin" => [
        "description" => "Simple admin UI for managing and sorting galleries",
        "name" => "Gallery",
        "permission" => "Manage Galleries"
    ],
    "sidemenu" => ["galleries" => "Galleries"]
];
