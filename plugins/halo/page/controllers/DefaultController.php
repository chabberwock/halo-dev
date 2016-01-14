<?php

namespace halo\page\controllers;

use yii\web\Controller;
use halo\page\models\Page;

class DefaultController extends Controller
{
    
    public function actionIndex($uri = '')
    {
        $page = Page::findOne(['uri'=>$uri]);
        if ($page === null) {
            throw new \yii\web\HttpException(404, 'Not found');
        }
        if ($page->status != 1) {
            throw new \yii\web\HttpException(404, 'Not found');
        }
        $this->layout = $page->layout;
        
        
        return $this->render('index', ['page'=>$page]);
    }
}
