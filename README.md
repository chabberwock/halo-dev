# Halo CMS - Proper Yii2 CMS

This repository assembles braviest heroes, who devoted their lives to build one more
Yii2 CMS and save the World. 

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

## CMS Features

### Basic installer

Contains basic installer, that will configure your database settings and install plugins. 
You still need composer in this developer branch for initial Yii2 setup, but that wont be required 
in final version

### Plugin based
Plugins are basically yii2 modules with some extra capabilities:
 
* They can affect application config
* Be enabled and disabled in runtime
* support yii2 extensions locally - each plugin can have its own /vendor dir
* Contains gii based plugin generator for quick start

### Theme support
You can build your own themes for Halo CMS.

### Non restrictive
Almost any yii2 module can be easily converted into Halo plugin

## DIRECTORY STRUCTURE

```
config/                  contains user aplication settings
plugins                  Plugins root directory
    halo                 Namespace for core plugins, that should be distributed with every cms copy
        admin/           Provides admin panel
        system/          System plugin. it is the core of Halo CMS
        devtools/        Various developer tools
        user/            User plugin based on dektrium\user   
        block/           Used to build html content blocks for frontend
        frontpage/       Manages frontpage, contains one API method to set default route
        page/            Manages static pages
css/                     Shouldn't be there, but I'm too lazy to build proper theme now
runtime/                 contains files generated during runtime
themes/                  Contains CMS themes
vendor/                  vendor dir for composer
```

## Quick start guide

1. Download
2. composer install yii2 and other stuff
3. make sure runtime and config dirs are writeable
5. run install.php
6. login to /admin/ as user: admin, password: 123456
