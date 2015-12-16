<?php

namespace halo\frontpage\admin\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
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
