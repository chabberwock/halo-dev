<?php

namespace halo\frontpage\admin\controllers;

use yii\web\Controller;
use Yii;
use halo\frontpage\admin\models\Settings;

class DefaultController extends Controller
{

    public function init()
    {
        // Render settings menu on every controller action
        \Yii::$app->getModule('admin')->contentMenu();
    }
    
    public function actionIndex()
    {
        $settings = new Settings;
        $settings->handler = Yii::$app->params['frontpageRoute'];
        if ($settings->load(Yii::$app->request->post()) && $settings->validate())
        {
            Yii::$app->getModule('halo.frontpage')->setRoute($settings->handler);
            Yii::$app->session->setFlash('success', 'Settings updated');
        }
        
        return $this->render('index', ['settings'=>$settings]);
    }
}
