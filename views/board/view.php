<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $board app\models\Board */
$this->title = 'My Yii Application';

$this->params['breadcrumbs'] = $board->genBreadcrumbs();
?>

<div class="board-view">

    <?= $this->render('../partial/board-list', ['board' => $board, 'sub_boards' => $sub_boards]) ?>

    <?= \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>

    <div class="list-meta">
        <span class="list-sort">
            <?= Html::a(Yii::t('app/main', 'Latest Topic'), ['/board/view', 'id' => $board->id, 'sort' => 'postdate']) ?>
            <?= Html::a(Yii::t('app/main', 'Latest Post'), ['/board/view', 'id' => $board->id]) ?>
        </span>
    </div>
    <table class="table table-bordered">
        <?php foreach ($dataProvider->models as $topic): ?>
            <tr>
                <td><?= Html::a($topic->title, ['/topic/view', 'id' => $topic->id]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
</div>
