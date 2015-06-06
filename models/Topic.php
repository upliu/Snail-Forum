<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%topic}}".
 *
 * @property integer $id
 * @property integer $board_id
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_top
 * @property integer $is_deleted
 * @property integer $is_locked
 * @property integer $author_id
 * @property string $author_username
 * @property integer $last_post_time
 * @property integer $last_post_user_id
 * @property string $last_post_username
 * @property integer $count_view
 * @property integer $count_post
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%topic}}';
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
    public function rules()
    {
        return [
            [['board_id', 'title', 'content', 'created_at', 'author_id'], 'required'],
            [['board_id', 'created_at', 'updated_at', 'is_top', 'is_deleted', 'is_locked', 'author_id', 'last_post_time', 'last_post_user_id', 'count_view', 'count_post'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['author_username', 'last_post_username'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'board_id' => 'Board ID',
            'title' => Yii::t('app/main', 'Title'),
            'content' => '内容',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_top' => 'Is Top',
            'is_deleted' => 'Is Deleted',
            'is_locked' => 'Is Locked',
            'author_id' => 'Author ID',
            'author_username' => 'Author Username',
            'last_post_time' => 'Last Post Time',
            'last_post_user_id' => 'Last Post User ID',
            'last_post_username' => 'Last Post Username',
            'count_view' => 'Count View',
            'count_post' => 'Count Post',
        ];
    }
}
