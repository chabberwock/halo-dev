<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<h1>What plugins would you like to activate?</h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'items')->checkboxList($plugins); ?>
<?= Html::submitButton('Install plugins', ['class'=>'btn btn-primary']) ?>
<?php ActiveForm::end() ?>