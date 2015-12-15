<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

return [
    'bootstrap' => ['halo\devtools\Bootstrap'],
    'modules' => [
        'halo.devtools' => [
            'class' => 'halo\devtools\Plugin'
        ],
        'gii' => [
            'class'      => 'yii\gii\Module',
            'generators' => [
                'plugin'   => ['class' => 'halo\devtools\generators\plugin\Generator']
            ]
        ],        
    ],
    
];  
?>
