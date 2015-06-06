<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->registerJsFile('@web/tinymce/tinymce.min.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = Yii::t('app/main', 'Create New Post');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-create">
<?= Html::beginForm() ?>
<?= Html::input('text', 'title'); ?>
<?= Html::endForm() ?>
</div>