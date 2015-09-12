<?php
namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Topic;
use yii\web\Controller;
use app\models\Board;
use yii\web\NotFoundHttpException;
use app\models\Post;
use yii\data\ActiveDataProvider;

class TopicController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNew($bid)
    {
        $board_id = $bid;
        /* @var $board \app\models\Board */
        $board = Board::findOne($board_id);
        if (!$board) {
            throw new NotFoundHttpException(Yii::t('app/main', 'The board does not exist'));
        }

        $topic = new Topic();
        $topic->board_id = $board_id;
        $topic->author_id = Yii::$app->user->identity->id;
        $topic->author_username = Yii::$app->user->identity->username;
        if ($topic->load(Yii::$app->request->post()) && $topic->save()) {
            $board->last_topic_id = $topic->id;
            $board->last_topic_title = $topic->title;
            $board->last_publish_time = time();
            $board->save();

            Board::updateAllCounters(['count_topic' => 1], ['id' => $board->id]);

            return $this->redirect(['/topic/view', 'id' => $topic->id]);
        }

        return $this->render('new', [
            'model' => $topic,
            'board' => $board,
        ]);
    }

    public function actionView($id)
    {
        /* @var $topic \app\models\Topic */
        $topic = Topic::findOne(['id' => $id, 'is_deleted' => 0]);
        if (!$topic) {
            throw new NotFoundHttpException(Yii::t('app/main', 'The topic does not exist'));
        }

        $board = Board::findOne($topic->board_id);
        $author = User::findOne($topic->author_id);

        return $this->render('view', [
            'topic' => $topic,
            'board' => $board,
            'author' => $author,
        ]);
    }

    public function actionAjaxPost($tid, $page = 1)
    {
        $topic_id = $tid;
        $query = Post::find()->where([
            'topic_id' => $topic_id,
            'pid' => 0,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->renderPartial('ajax-post', compact('dataProvider'));
    }

}