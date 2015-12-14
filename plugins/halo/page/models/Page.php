<?php

namespace halo\page\models;

use Yii;

/**
 * This is the model class for table "halo_page".
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
        return 'halo_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'required'],
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
            'id' => Yii::t('halo/page', 'ID'),
            'uri' => Yii::t('halo/page', 'Uri'),
            'title' => Yii::t('halo/page', 'Title'),
            'created_at' => Yii::t('halo/page', 'Created At'),
            'updated_at' => Yii::t('halo/page', 'Updated At'),
            'html' => Yii::t('halo/page', 'Html'),
            'meta_keywords' => Yii::t('halo/page', 'Meta Keywords'),
            'meta_description' => Yii::t('halo/page', 'Meta Description'),
        ];
    }
}
