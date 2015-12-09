<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;  
?>

<h1>Installer</h1>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'host')->textInput() ?>
<?= $form->field($model, 'databaseName')->textInput() ?>
<?= $form->field($model, 'userName')->textInput() ?>
<?= $form->field($model, 'password')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Continue', ['class'=>'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
