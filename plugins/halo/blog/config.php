<?php
// this config will be merged into main application config
return [
    'bootstrap' => ['halo\blog\Bootstrap'],
    'modules' => [
        'halo.blog' => [
            'class' => 'halo\blog\Plugin'
        ],
    ],
];  
