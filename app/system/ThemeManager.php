<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace app\system;
use yii\base\Component;
use Yii;

class ThemeManager extends Component
{
    public $theme;
    public $themeDir;
    public function init()
    {
        $this->activate();    
    }
    
    public function activate()
    {
        Yii::setAlias('@theme', $this->themeDir . '/' . $this->theme);
        $viewConfig = [
            'basePath' => '@theme',
            'baseUrl' => '@web/themes/' . $this->theme,
            'pathMap' => [
                '@app' => '@theme'
            ]
        ];
        if (!isset(Yii::$app->view->theme)) {
            $viewConfig['class'] = 'yii\base\Theme';
            Yii::$app->view->theme = Yii::createObject($viewConfig);    
        } else {
            Yii::configure(Yii::$app->view->theme, $viewConfig);
        }
        Yii::$app->layoutPath = '@theme/layouts';   
    }
    
    
}
  
?>
