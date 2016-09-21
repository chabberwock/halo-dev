<?php
// this config will be merged into main application config
return [
    'bootstrap' => ['halo\contact\Bootstrap'],
    'modules' => [
        'halo.contact' => [
            'class' => 'halo\contact\Plugin'
        ],
    ],
    'components' => [
        'urlManager' => [
            'rules' => [
                '/contact' => '/halo.contact/default/index'
            ]
        ],
    ]
];  
