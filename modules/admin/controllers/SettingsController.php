<?php

namespace admin\controllers;

use admin\events\Menu;
use Yii;

class SettingsController extends \yii\web\Controller
{
    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('admin')->settingsMenu();
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
}
