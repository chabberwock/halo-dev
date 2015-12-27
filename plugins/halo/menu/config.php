<?php
// this config will be merged into main application config
return [
    'bootstrap' => ['halo\menu\Bootstrap'],
    'modules' => [
        'halo.menu' => [
            'class' => 'halo\menu\Plugin'
        ],
    ],
];  
