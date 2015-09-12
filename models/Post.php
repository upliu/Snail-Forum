<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property integer $topic_id
 * @property integer $author_id
 * @property integer $created_at
 * @property string $content
 * @property integer $reply_to
 * @property integer $is_deleted
 * @property integer $pid
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'author_id', 'created_at', 'content'], 'required'],
            [['topic_id', 'author_id', 'created_at', 'reply_to', 'is_deleted', 'pid'], 'integer'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_id' => 'Topic ID',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'content' => 'Content',
            'reply_to' => 'Reply To',
            'is_deleted' => 'Is Deleted',
            'pid' => 'Pid',
        ];
    }
}
