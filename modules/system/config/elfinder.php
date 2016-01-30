<?php
return [
    'class' => 'mihaildev\elfinder\Controller',
    'access' => ['@', '?'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
    'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
    'roots' => [
        [
            'baseUrl'=>'@web',
            'basePath'=>'@webroot',
            'path' => 'files/global',
            'name' => 'Global'
        ],
    ],
    'watermark' => [
            'source'         => __DIR__.'/logo.png', // Path to Water mark image
             'marginRight'    => 5,          // Margin right pixel
             'marginBottom'   => 5,          // Margin bottom pixel
             'quality'        => 95,         // JPEG image save quality
             'transparency'   => 70,         // Water mark image transparency ( other than PNG )
             'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
             'targetMinPixel' => 200         // Target image minimum pixel size
    ]
];
?>
