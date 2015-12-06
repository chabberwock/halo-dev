<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

return [
    'modules' => [
        'admin' => [
            'class' => 'app\admin\Module',
            'modules' => [
                'frontpage' => [
                    'class' => 'core\frontpage\admin\Module',
                ]
            ]
        ]
    ]
];  
?>
