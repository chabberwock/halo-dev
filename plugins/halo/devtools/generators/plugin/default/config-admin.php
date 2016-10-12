<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

echo "<?php\n";
?>
// this config will be merged into admin module config
return [
    'modules' => [
        '<?= $generator->fullID() ?>' => [
            'class' => '<?= $generator->ns() ?>\admin\Module',
        ]    
    ]
];  
