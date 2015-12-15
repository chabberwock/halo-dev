<?php

namespace halo\devtools\admin\controllers;

use yii\web\Controller;
use Yii;


class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionExtensions()
    {
        return $this->render('extensions', ['extensions'=>Yii::$app->extensions]);
    }
    
}
