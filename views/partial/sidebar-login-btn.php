<?php
use yii\helpers\Html;
?>
<div class="center">
<div class="row">
<?= Html::a(Yii::t('app/main', 'Sign Up'), ['site/signup'], ['class' => 'btn btn-default']) ?>
</div>
<div class="row">
    <?= Html::a(Yii::t('app/main', 'Login'), ['site/login']) ?>
</div>
</div>