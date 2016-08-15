<?php

return [
    1 => [
        'label' => 'Manager',
        'permission' => [
            'HomeController@index',

            'GameContentsController@index',
            'GameContentsController@create',
            'GameContentsController@edit',
            'GameContentsController@destroy',
            'GameContentsController@update',
            'GameContentsController@store',

            'PostsController@index',
            'PostsController@create',
            'PostsController@edit',
            'PostsController@destroy',
            'PostsController@update',
            'PostsController@store',

            'SettingsController@index',
            'SettingsController@create',
            'SettingsController@edit',
            'SettingsController@destroy',
            'SettingsController@update',
            'SettingsController@store',

        ]
    ],

    2 => [
        'label' => 'Editor',
        'permission' => [
            'HomeController@index',

            'GameContentsController@index',
            'GameContentsController@create',
            'GameContentsController@edit',
            'GameContentsController@destroy',
            'GameContentsController@update',
            'GameContentsController@store',

            'PostsController@index',
            'PostsController@create',
            'PostsController@edit',
            'PostsController@destroy',
            'PostsController@update',
            'PostsController@store',

            'SettingsController@index',
            'SettingsController@create',
            'SettingsController@edit',
            'SettingsController@destroy',
            'SettingsController@update',
            'SettingsController@store',
        ]
    ]
];