<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $board app\models\Board */
$this->title = 'My Yii Application';

$this->params['breadcrumbs'] = $board->genBreadcrumbs();
?>

<div class="board-view">

    <?= $this->render('../partial/board-list', ['board' => $board, 'sub_boards' => $sub_boards]) ?>

    <div class="panel panel-default">
        <div class="panel-body board-category">

        </div>
    </div>

</div>
