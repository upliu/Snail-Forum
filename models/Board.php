<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

/**
 * This is the model class for table "snail_forum_forum".
 *
 * @property integer $id
 * @property string $name
 * @property integer $display_order
 * @property integer $pid
 * @property integer $count_topic
 * @property integer $count_post
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $last_topic_id
 * @property string $last_topic_title
 * @property integer $last_post_id
 * @property integer $last_publish_time
 * @property integer $col_num
 * @property string $icon
 * @property string $path
 */
class Board extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'last_topic_title'], 'string', 'max' => 50],
            [['display_order', 'pid', 'count_topic', 'count_post', 'created_at', 'updated_at', 'last_topic_id', 'last_post_id', 'last_publish_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Title',
            'display_order' => 'Display Order',
            'pid' => 'Pid',
            'count_topic' => 'Count Topic',
            'count_post' => 'Count Post',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_topic_id' => 'Last Topic ID',
            'last_topic_title' => 'Last Topic Title',
            'last_post_id' => 'Last Post ID',
            'last_publish_time' => 'Last Publish Time',
        ];
    }

    public static function findRootBoards()
    {
        return static::find()->where(['pid' => 0])->orderBy('display_order DESC')->all();
    }

    /**
     * @param $pids
     * @return array|\yii\db\ActiveRecord[]|int
     */
    public static function findSubBoards($pids)
    {
        return static::find()->where(['pid' => $pids])->orderBy('display_order DESC')->indexBy('id')->all();
    }

    public function getParentNames()
    {
        $parent_pids = $this->decodePath();
        $boards = [];
        if (!empty($parent_pids)) {
            $rows = static::find()->select('id,name')->where(['id' => $parent_pids])->indexBy('id')->asArray()->all();
            // 确保顺序是从祖先一级级往下
            foreach ($parent_pids as $id) {
                $boards[] = $rows[$id];
            }
        }

        return $boards;
    }

    /**
     * @return array
     */
    public function decodePath()
    {
        try {
            return Json::decode($this->path);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function setPid($pid)
    {

    }

    public function genBreadcrumbs()
    {
        $breadcrumbs[] = ['label' => Yii::t('app/main', 'Board'), 'url' => '/board/index'];
        $parent_names = $this->getParentNames();
        foreach ($parent_names as $p) {
            $breadcrumbs[] = ['label' => $p['name'], 'url' => ['board/view', 'id' => $p['id']]];
        }
        $breadcrumbs[] = ['label' => $this->name, 'url' => ['board/view', 'id' => $this->id]];

        return $breadcrumbs;
    }
}
