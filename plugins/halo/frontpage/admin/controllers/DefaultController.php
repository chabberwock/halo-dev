<?php

namespace halo\frontpage\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
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
