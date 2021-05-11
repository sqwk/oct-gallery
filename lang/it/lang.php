<?php
return [
    "column" => [
        "created" => "Creata",
        "description" => "Descrizione",
        "images" => "Clicca e trascina qui le tue immagini",
        "name" => "Nome della galleria"
    ],
    "form" => [
        "label" => "Seleziona una o più gallerie da allegare al post ",
        "tab" => "Gallerie"
    ],
    "galleriescomponent" => [
        "description" => "Visualizza un elenco di tutte le gallerie disponibili",
        "name" => "Gallerie",
        "property" => [
            "order" => "Ordina le gallerie",
            "orderDescription" => "Attributo usato per ordinare le gallerie",
            "orderIdasc" => "Le nuove per ultime",
            "orderIddesc" => "Le nuove per prime",
            "orderNameasc" => "Per nome, asc",
            "orderNamedesc" => "Per nome, disc",
            "orderRandom" => "Causali",
            "page" => "Pagina della galleria",
            "pageDescription" => "",
            "results" => ""
        ]
    ],
    "gallerycomponent" => [
        "description" => "Visualizza una singola galleria.",
        "name" => "Galleria",
        "property" => [
            "gallery" => "Seleziona la galleria",
            "galleryDescription" => "Seleziona una galleria specifica o individuala usando lo slug",
            "gallerySlug" => "Usa lo slug della galleria",
            "maxDimension" => "Dimensione massima",
            "maxDimensionDescription" => "La lunghezza del lato più lungo delle immagini se Image Resizer è installato",
            "slug" => "Slug della galleria",
            "slugDescription" => "Questa è la parte dell'url necessaria a recuperare la galleria"
        ]
    ],
    "plugin" => [
        "description" => "Semplice admin UI per gestire e ordinare le gallerie",
        "name" => "Galleria",
        "permission" => "Gestione gallerie"
    ],
    "sidemenu" => ["galleries" => "Gallerie"]
];
