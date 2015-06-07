<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $topic app\models\Topic */
/* @var $board app\models\Board */
/* @var $author app\models\User */


$this->title = $topic->title;

$this->params['breadcrumbs'] = $board->genBreadcrumbs();
$this->params['breadcrumbs'][] = $topic->title;
?>

<div class="topic-view">
    <div class="row topic">
        <div class="col-md-2">
            <a class="avatar" href="<?= Url::to(['/user/view', ['id' => $author->id]]) ?>">
                <img src="<?= $author->avatar ?>">
            </a>
            <?= $author->username ?>
        </div>
        <div class="col-md-10">
            <?= $topic->content ?>
        </div>
    </div>
</div>