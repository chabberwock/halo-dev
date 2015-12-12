<?php

namespace halo\frontpage\admin\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('halo.admin')->contentMenu();
    }
    
    public function actionIndex()
    {
        $defaultRoute = '/halo.page/default/index';
        Yii::$app->getModule('halo.frontpage')->setRuntimeConfig(['defaultRoute'=>$defaultRoute]);
        return $this->render('index');
    }
}
