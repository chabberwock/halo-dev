<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

return [
    'bootstrap' => ['halo\frontpage\Bootstrap'],
    'defaultRoute' => '/halo.frontpage/default',
    'modules' => [
        'halo.frontpage' => [
            'class' => 'halo\frontpage\Module'
        ]
    ]
];  
?>
