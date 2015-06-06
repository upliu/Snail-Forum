<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $board app\models\Board */
/* @var $sub_boards app\models\Board[] */

?>

<?php if (!empty($sub_boards)) : ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $board->name ?></h3>
    </div>
    <div class="panel-body board-category">
        <?php $is_first = true; ?>
        <?php foreach ($sub_boards as $board): ?>
            <?php /* @var $board app\models\Board */ ?>
            <div class="row board-row <?= $is_first ? 'is-first' : '' ?>">
                <?php $is_first = false; ?>
                <div class="col-lg-8">
                    <?= Html::img($board->icon, ['class' => 'board-icon']) ?>
                    <?= Html::a($board->name, ['board/view', 'id' => $board->id]) ?>
                </div>
                <div class="col-lg-1"><?= $board->count_post ?>/<?= $board->count_topic ?></div>
                <div class="col-lg-3">
                    <?php if ($board->last_publish_time > 0) : ?>
                        <?= Html::a($board->last_topic_title, ['topic/view', 'id' => $board->last_topic_id, '#' => 'post-id-' . $board->last_post_id]) ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; // if (!empty($sub_boards)) ?>
