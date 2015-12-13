<?php
$this->title = 'Frontpage';
?>

<div class="callout callout-success">
    <h4><i class="fa fa-info"></i> Current frontpage route </h4>
    <p><?= Yii::$app->defaultRoute ?></p>
</div>

<p> Frontpage is controlled by plugins. If you are developer, use this code to set frontpage:</p>
<pre>
    Yii::$app->getModule('halo.frontpage')->setRoute('your route');
</pre>