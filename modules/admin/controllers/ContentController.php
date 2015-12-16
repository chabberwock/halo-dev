<?php

namespace admin\controllers;

class ContentController extends \yii\web\Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('admin')->contentMenu();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
