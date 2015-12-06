<?php

namespace core\page\controllers;

use yii\web\Controller;
use core\page\models\Page;

class DefaultController extends Controller
{
    public function actionIndex($id)
    {
        $page = Page::findOne($id);
        if ($page === null) {
            throw new \yii\web\HttpException(404, 'Not found');
        }
        return $this->render('index', ['page'=>$page]);
    }
}
