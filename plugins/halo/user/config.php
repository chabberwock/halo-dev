<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
return [
    'extensions' => [
          'yiisoft/yii2-authclient' => 
          array (
            'name' => 'yiisoft/yii2-authclient',
            'version' => '2.0.5.0',
            'alias' => 
            array (
              '@yii/authclient' => __DIR__ . '/vendor/yiisoft/yii2/authclient',
            ),
          ),
          'cebe/yii2-gravatar' => 
          array (
            'name' => 'cebe/yii2-gravatar',
            'version' => '1.1.0.0',
            'alias' => 
            array (
              '@cebe/gravatar' => __DIR__ . '/vendor/cebe/yii2-gravatar',
            ),
          ),
          'dektrium/yii2-user' => 
          array (
            'name' => 'dektrium/yii2-user',
            'version' => '0.9.5.0',
            'alias' => 
            array (
              '@dektrium/user' => __DIR__ . '/vendor/dektrium/yii2-user',
            ),
            'bootstrap' => 'dektrium\\user\\Bootstrap',
          ),
    ],
    'bootstrap' => [
        'halo\user\Bootstrap'
    ],
    'modules' => [
        'halo.user' => [
                'class' => 'halo\user\Plugin',
        ],        
        'user' => [
                'class' => 'dektrium\user\Module',
                'admins' => ['admin'],
                'controllerMap' => [
                    'admin' => 'halo\user\admin\AdminController'
                ],
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user' => '@theme/user'
                ]
            ]
        ]
    ]
    
    
];  
?>
