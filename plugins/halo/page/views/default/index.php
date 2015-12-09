<?php

$this->title = $page->title;
$this->registerMetaTag(['name'=>'keywords', 'content'=>$page->meta_keywords]);
$this->registerMetaTag(['name'=>'description', 'content'=>$page->meta_description]);

?>

<h1><?= $page->title ?></h1>

<?= $page->html ?>