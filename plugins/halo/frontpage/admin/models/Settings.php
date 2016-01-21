<?php

namespace halo\frontpage\admin\models;

use Yii;
use yii\base\Model;
use halo\frontpage\events\FrontpageHandlers;

/**
 * ContactForm is the model behind the contact form.
 */
class Settings extends Model
{
    public $handler;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['handler'], 'required'],
            [['handler'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'handler' => 'Front Page Handler',
        ];
    }
    
    public function getHandlers()
    {
        $event = new FrontpageHandlers;
        $event->handlers['default'] = 'Any available';
        Yii::$app->trigger('halo.frontpage', $event);
        return $event->handlers;
    }

}
