<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model halo\page\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'html')->widget(CKEditor::className(), 
                [
                    'editorOptions' => [
                        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ])->label('Content'); ?>
        </div>
        
        <div class="col-md-4">
            
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Publish</div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('halo/page', 'Create') : Yii::t('halo/page', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                    <?= $form->field($model, 'status')->dropDownList(['0'=>'Draft', '1'=>'Published']) ?>
                    <?= $form->field($model, 'setFrontpage')->checkbox() ?>
                </div>
            </div>
            
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Options</div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'layout')->dropDownList(['@theme/layouts/main'=>'Default']) ?>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">SEO</div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            
        
        </div>    
    
    </div>
    


    <?php ActiveForm::end(); ?>

</div>
