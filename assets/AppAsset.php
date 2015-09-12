<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/snail.css',
        'http://wordpress.local.net/wp-includes/css/editor.min.css?ver=4.2.2',
    ];
    public $js = [
        'js/snail.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
