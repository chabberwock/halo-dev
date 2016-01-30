<?php

namespace halo\blog\models;

use Yii;

/**
 * This is the model class for table "halo_blog_post".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $title
 * @property string $content
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'halo_blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'title', 'content'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
