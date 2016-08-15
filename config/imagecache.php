<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    | 
    | {route}/{template}/{filename}
    | 
    | Examples: "images", "img/cache"
    |
    */
   
    'route' => 'img/cache',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submited 
    | by URI. 
    | 
    | Define as many directories as you like.
    |
    */
    
    'paths' => array(
        public_path('files')
    ),

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation filter templates.
    | The keys of this array will define which templates 
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    | The values of this array will define which filter class
    | will be applied, by its fully qualified name.
    |
    */
   
    'templates' => array(
        'small' => 'Intervention\Image\Templates\Small',
        'medium' => 'Intervention\Image\Templates\Medium',
        'large' => 'Intervention\Image\Templates\Large',

        '555x401' => function($image) {
            return $image->fit(555, 401);
        },

        '262x190' => function($image) {
            return $image->fit(262, 190);
        },

        '652x401' => function($image) {
            return $image->fit(652, 401);
        },

        '360x195' => function($image) {
            return $image->fit(360, 195);
        },

        '340x184' => function($image) {
            return $image->fit(340, 184);
        },

        '241x343' => function($image) {
            return $image->fit(241, 343);
        },

        '360x362' => function($image) {
            return $image->fit(360, 362);
        },

        '267x267' => function($image) {
            return $image->fit(267, 267);
        },

        '77x77' => function($image) {
            return $image->fit(77, 77);
        },

        '172x172' => function($image) {
            return $image->fit(172, 172);
        },

        '600x286' => function($image) {
            return $image->fit(600, 286);
        },
        '680x537' => function($image) {
            return $image->fit(680, 537);
        },

        '86x148' => function($image) {
            return $image->fit(86, 148);
        },

        '555x359' => function($image) {
            return $image->fit(555, 359);
        },

        '460x249' => function($image) {
            return $image->fit(460, 249);
        },
    ),

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the image cache route.
    |
    */
   
    'lifetime' => 43200,

);
