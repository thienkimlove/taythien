<?php

return [

    'feeds' => [
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             */
            'items' => 'App\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feed',

            'title' => 'Tay Thien Ky RSS',
        ],
    ],

];
