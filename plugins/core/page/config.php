<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

return [
    'modules' => [
        'page' => [
            'class' => 'core\page\Module'
        ]
    ],
    'components' => [
        'i18n' => [
            'class' => 'yii\i18n\I18N',
            'translations' => [
                'core/page*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@core/page/messages',
                ],
            ],
        ],
    ],    
];  
?>
