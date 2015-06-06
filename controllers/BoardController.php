<?php
namespace app\controllers;

use Yii;
use app\helpers\ArrayHelper;
use app\models\Board;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BoardController extends Controller
{

    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    'allow' => true,
//                ],
//            ],
        ];
    }

    public function init()
    {
        parent::init();
        $this->view->params['breadcrumbs'][] = ['label' => Yii::t('app/main', 'Board'), 'url' => '/board/index'];
    }

    public function actionIndex()
    {
        $root_boards = Board::findRootBoards();
        $pids = ArrayHelper::columnValuesUnique($root_boards, 'id');
        $sub_boards = Board::findSubBoards($pids);
        $sub_boards = ArrayHelper::group($sub_boards, 'pid');
        return $this->render('index', compact('root_boards', 'sub_boards'));
    }

    public function actionView($id)
    {
        $board = Board::findOne($id);
        if (!$board) {
            throw new NotFoundHttpException(Yii::t('app/main', 'The board does not exist'));
        }

        $sub_boards = Board::findSubBoards($board->id);
        $parent_names = $board->getParentNames();

        \Yii::$app->session->set('board_id', $id);
        return $this->render('view', compact('sub_boards', 'board', 'parent_names'));
    }

}