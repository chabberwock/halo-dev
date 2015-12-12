<?php

namespace halo\admin\controllers;

class ContentController extends \yii\web\Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('halo.admin')->contentMenu();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
