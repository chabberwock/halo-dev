<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

return [
    'modules' => [
        'halo.page' => [
            'class' => 'halo\page\Module'
        ]
    ],
    'components' => [
        'i18n' => [
            'class' => 'yii\i18n\I18N',
            'translations' => [
                'halo/page*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@halo/page/messages',
                ],
            ],
        ],
        'urlManager' => [
            'rules' => [
                'page/<uri:.+>' => 'halo-page/default/index'
            ]
        ],
    ],    
];  
?>
