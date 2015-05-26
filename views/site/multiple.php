<?php
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-multiple">
<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Generate Random String", ['site/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomString ?></h3>
    <?php Pjax::end(); ?>
</div>

<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Generate Random Key", ['site/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomKey ?><h3>
    <?php Pjax::end(); ?>
</div>
</div>