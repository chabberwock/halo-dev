<?php

namespace halo\system\models;

use Yii;

/**
 * This is the model class for table "system_plugin".
 *
 * @property string $id
 * @property string $version
 * @property integer $is_disabled
 * @property integer $is_locked
 */
class Plugin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_plugin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'version', 'is_disabled', 'is_locked'], 'required'],
            [['is_disabled', 'is_locked'], 'integer'],
            [['id', 'version'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('core/page', 'ID'),
            'version' => Yii::t('core/page', 'Version'),
            'is_disabled' => Yii::t('core/page', 'Is Disabled'),
            'is_locked' => Yii::t('core/page', 'Is Locked'),
        ];
    }
}
