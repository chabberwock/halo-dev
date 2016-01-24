<?php

namespace admin\controllers;
use Yii;

class ContentController extends \yii\web\Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('admin')->contentMenu();
    }

    public function actionIndex()
    {
        $miniWidgets = \Yii::$app->getModule('admin')->ui->widgets('content.mini');
        $widgets = \Yii::$app->getModule('admin')->ui->widgets('content');
        
        return $this->render('index', ['miniWidgets'=>$miniWidgets, 'widgets'=>$widgets]);
    }
    
    

}
