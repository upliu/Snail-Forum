<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */
/* @var $board app\models\Board */

$this->registerJsFile('@web/tinymce/tinymce.min.js', ['depends' => 'yii\web\JqueryAsset']);

$this->title = Yii::t('app/main', 'Create New Topic');

$this->params['breadcrumbs'] = $board->genBreadcrumbs();
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-create">
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea(['class' => 'dn']) ?>
<?= Html::submitButton(Yii::t('app/main', 'Submit'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>