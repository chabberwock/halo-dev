<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

?>

<h1>Success</h1>

<p>Admin access</p>
<p>Login: admin </p>
<p>Password: 123456 </p>
<p>
<?= Html::a('Visit admin', '/halo.admin/', ['class'=>'btn btn-primary']) ?>
</p>

<p>
<?= Html::a('Visit site', ['/'], ['class'=>'btn btn-primary']) ?>
</p>