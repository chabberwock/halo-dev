<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

echo "<?php\n";
?>
// this config will be merged into halo.admin module config
return [
    'modules' => [
        '<?= $generator->fullID() ?>.admin' => [
            'class' => '<?= $generator->ns() ?>\admin\Module',
        ]    
    ]
];  
