<?php

namespace core\page\models;

use Yii;

/**
 * This is the model class for table "core_page".
 *
 * @property integer $id
 * @property string $uri
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $html
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at', 'html', 'meta_keywords', 'meta_description'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['html'], 'string'],
            [['uri', 'title'], 'string', 'max' => 250],
            ['uri','unique'],
            [['meta_keywords', 'meta_description'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('core/page', 'ID'),
            'uri' => Yii::t('core/page', 'Uri'),
            'title' => Yii::t('core/page', 'Title'),
            'created_at' => Yii::t('core/page', 'Created At'),
            'updated_at' => Yii::t('core/page', 'Updated At'),
            'html' => Yii::t('core/page', 'Html'),
            'meta_keywords' => Yii::t('core/page', 'Meta Keywords'),
            'meta_description' => Yii::t('core/page', 'Meta Description'),
        ];
    }
}
