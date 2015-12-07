<?php

namespace core\block\models;

use Yii;

/**
 * This is the model class for table "core_block".
 *
 * @property string $id
 * @property string $title
 * @property string $html
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['html'], 'string'],
            [['id'], 'string', 'max' => 32],
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
            'title' => 'Title',
            'html' => 'Html',
        ];
    }
}
