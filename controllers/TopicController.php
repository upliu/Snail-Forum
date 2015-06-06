<?php
namespace app\controllers;

use app\models\Topic;
use yii\filters\AccessControl;
use yii\web\Controller;

class TopicController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNew($board_id = null)
    {
        $topic = new Topic();
        return $this->render('new', ['model' => $topic]);
    }

}