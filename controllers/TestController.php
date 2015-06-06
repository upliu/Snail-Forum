<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 6/1/15
 * Time: 23:53
 */

namespace app\controllers;


use yii\helpers\Json;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionJson()
    {
        $string = '';
        $json = Json::decode($string);
        $json[] = 5;
        var_dump($json);
    }

}