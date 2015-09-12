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

<div class="topic-view" data-topic_id="<?= $topic->id ?>" data-load_post_url="<?= Url::to(['/topic/ajax-post']) ?>">
    <div class="row topic">
        <div class="col-md-2">
            <a class="avatar" href="<?= Url::to(['/user/view', ['username' => $author->username]]) ?>">
                <img src="<?= $author->avatar ?>">
            </a>
            <?= $author->username ?>
            <ul class="list-unstyled">
                <li><?= Yii::t('app/main', 'Topics Number: {num}', ['num' => $author->count_topic]) ?></li>
                <li><?= Yii::t('app/main', 'Posts Number: {num}', ['num' => $author->count_post]) ?></li>
                <li><?= Yii::t('app/main', 'Credit: {num}', ['num' => $author->credit]) ?></li>
            </ul>
            <?= Yii::t('app/main', 'Register Time: {dt}', ['dt' => date('Y-m-d', $author->created_at)]) ?>
        </div>
        <div class="col-md-10">
            <div class="topic-info">
                <?= date('Y-m-d Y:i:s', $topic->created_at) ?>
            </div>
            <div class="topic-content">
                <?= $topic->content ?>
            </div>
        </div>
    </div>
</div>