<?php
    return [
        'plugin' => [
            'name' => 'Galleria',
            'description' => 'Semplice admin UI per gestire e ordinare le gallerie',
            'permission' => 'Gestione gallerie'
        ],
        'sidemenu' => [
            'galleries' => 'Gallerie'
        ],
        'form' => [
            'label' => 'Seleziona una o più gallerie da allegare al post',
            'tab' => 'Gallerie'
        ],
        'gallerycomponent' => [
            'name' => 'Galleria',
            'description' => 'Visualizza una singola galleria.',
            'property' => [
                'gallery' => 'Seleziona la galleria',
                'galleryDescription' => 'Seleziona una galleria specifica o individuala usando lo slug',
                'gallerySlug' => 'Usa lo slug della galleria',
                'slug' => 'Slug della galleria',
                'slugDescription' => 'Questa è la parte dell\'url necessaria a recuperare la galleria'
                'maxDimension' => 'Dimensione massima',
                'maxDimensionDescription' => 'La lunghezza del lato più lungo delle immagini se Image Resizer è installato',
            ]
        ],
        'galleriescomponent' => [
            'name' => 'Gallerie',
            'description' => 'Visualizza un elenco di tutte le gallerie disponibili',
            'property' => [
                'order' => 'Ordina le gallerie',
                'orderDescription' => 'Attributo usato per ordinare le gallerie',
                'orderIddesc' => 'Le nuove per prime',
                'orderIdasc' => 'Le nuove per ultime',
                'orderNamedesc' => 'Per nome, disc',
                'orderNameasc' => 'Per nome, asc',
                'orderRandom' => 'Causali',
                'results' => 'Risultati per pagina'
                'page' => 'Pagina della galleria',
                'pageDescription' => 'Pagina in cui viene visualizzata una galleria. Questo attributo viene utilizzato per creare un collegamento alla galleria.',
            ]
        ],
        'column' => [
            'name' => 'Nome della galleria'
            'description' => 'Descrizione',
            'created' => 'Creata',
            'images' => 'Clicca e trascina qui le tue immagini',
        ]
    ];