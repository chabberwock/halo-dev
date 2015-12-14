<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\module\Generator */

?>
<div class="module-form">
<?php
    echo $form->field($generator, 'vendorID');
    echo $form->field($generator, 'pluginID');
    echo $form->field($generator, 'name');
    echo $form->field($generator, 'icon');
    echo $form->field($generator, 'author');
    echo $form->field($generator, 'description');
    echo $form->field($generator, 'homepage');
?>
</div>
