<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title . ' - ' . Yii::$app->params['config']['site_name']) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Snail-Forum',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse',
                ],
            ]);

            $menuItems = [
                ['label' => Yii::t('app/main', 'Forum'), 'url' => ['/topic/index']],
                ['label' => Yii::t('app/main', 'Board'), 'url' => ['/board/index']],
            ];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => Yii::t('app/main', 'Signup'), 'url' => ['/site/signup']];
                $menuItems[] = ['label' => Yii::t('app/main', 'Login'), 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => Yii::t('app/main', 'Logout ({name})', ['name' => Yii::$app->user->identity->username]),
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
                </div>

                <div class="col-lg-3">

                    <?= Html::a( '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>' . Yii::t('app/main', 'Create New Topic'), ['/topic/new', 'bid' => Yii::$app->session->get('board_id')], ['class' => 'btn btn-primary btn-block']) ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app/main', 'User Info') ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo $this->render('/partial/sidebar-login-btn.php');
                            } else {
                                echo $this->render('/partial/sidebar-user-info.php');
                            }
                            ?>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app/main', 'Information Bar') ?></h3>
                        </div>
                        <div class="panel-body">
                            这里是站点公告
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app/main', 'Forum Statistics') ?></h3>
                        </div>
                        <ul class="list-unstyled panel-body">
                            <li><?= Yii::t('app/main', 'Topics Number: {num}', ['num' => 89]) ?></li>
                            <li><?= Yii::t('app/main', 'Posts Number: {num}', ['num' => 239]) ?></li>
                            <li><?= Yii::t('app/main', 'Users Number: {num}', ['num' => 723]) ?></li>
                        </ul>
                    </div>

                    <div class="panel panel-default snail-friend-links">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app/main', 'Links') ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php $links = ['//www.baidu.com/'=>'百度','//www.qq.com'=>'腾讯']; ?>
                            <?php foreach ($links as $link => $title) {
                                echo Html::a($title, $link, ['target' => '_blank']);
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Yii::$app->params['config']['site_name'] ?> <?= date('Y') ?></p>
            <p class="pull-right">Powered by <a href="//snail-forum.upliu.net" target="_blank">Snail-Forum</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
