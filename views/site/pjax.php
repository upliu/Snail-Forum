<?php
use yii\helpers\Html;
use yii\widgets\Pjax;

$script = <<< JS
$(document).ready(function() {
    //setInterval(function(){ $("#refreshButton").click(); }, 1000);
});
JS;
$this->registerJs($script);

/* @var $this yii\web\View */
$this->title = 'Pjax Demo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-pjax">
    <?php Pjax::begin(); ?>
    <?= Html::a("Show Time", ['site/time'], ['class' => 'btn btn-lg btn-primary']) ?>
    <?= Html::a("Show Date", ['site/date'], ['class' => 'btn btn-lg btn-success']) ?>
    <h1>It's: <?= $response ?></h1>
    <?php Pjax::end(); ?>
</div>
