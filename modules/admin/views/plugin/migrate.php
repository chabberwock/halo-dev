<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Migration log';
?>

<pre>
<?= $result ?>
</pre>

<?= Html::a('Return to dashboard', ['/admin/plugin/index'], ['class'=>'btn btn-primary']); ?>