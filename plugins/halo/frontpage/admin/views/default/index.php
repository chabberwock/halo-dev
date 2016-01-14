<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Frontpage';
?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($settings, 'handler')->dropDownList($settings->getHandlers()) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>

