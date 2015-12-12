<?php

namespace halo\admin\controllers;

use halo\admin\events\Menu;
use Yii;

class SettingsController extends \yii\web\Controller
{
    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('halo.admin')->settingsMenu();
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionExtensions()
    {
        return $this->render('extensions', ['extensions'=>Yii::$app->extensions]);
    }

}
