<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';


foreach ($parent_names as $p) {
    $this->params['breadcrumbs'][] = ['label' => $p['name'], 'url' => ['board/view', 'id' => $p['id']]];
}
$this->params['breadcrumbs'][] = ['label' => $board->name, 'url' => ['board/view', 'id' => $board->id]];
?>

<div class="board-view">

    <?= $this->render('../partial/board-list', ['board' => $board, 'sub_boards' => $sub_boards]) ?>

    <div class="panel panel-default">
        <div class="panel-body board-category">

        </div>
    </div>

</div>
