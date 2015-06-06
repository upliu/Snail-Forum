<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';

?>

<div class="board-index">
    <?php foreach ($root_boards as $root_board): ?>

        <?= $this->render('../partial/board-list', ['board' => $root_board, 'sub_boards' => $sub_boards[$root_board->id]]) ?>

    <?php endforeach; ?>
</div>
