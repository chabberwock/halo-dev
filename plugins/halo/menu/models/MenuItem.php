<?php

namespace halo\menu\models;

use Yii;

/**
 * This is the model class for table "halo_menu_item".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $menu_id
 * @property string $title
 * @property string $route
 */
class MenuItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'halo_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'menu_id', 'title', 'route'], 'required'],
            [['parent_id', 'order_id'], 'integer'],
            [['menu_id'], 'string', 'max' => 32],
            [['title', 'route'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'menu_id' => 'Menu ID',
            'title' => 'Title',
            'route' => 'Route',
        ];
    }
}
