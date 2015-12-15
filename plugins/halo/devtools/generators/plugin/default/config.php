<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

echo "<?php\n";
?>
// this config will be merged into main application config
return [
    'bootstrap' => ['<?=$generator->ns() ?>\Bootstrap'],
    'modules' => [
        '<?= $generator->fullID() ?>' => [
            'class' => '<?=$generator->ns() ?>\Plugin'
        ],
    ],
];  
