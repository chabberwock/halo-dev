<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace system;
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
                '@halo' => '@theme'
            ]
        ];
        
        if (!isset(Yii::$app->view->theme)) {
            $viewConfig['class'] = 'yii\base\Theme';
            Yii::$app->view->theme = Yii::createObject($viewConfig);    
        } else {
            $theme = Yii::$app->view->theme;
            $theme->basePath = '@theme';
            $theme->baseUrl = '@web/themes/' . $this->theme;
            $theme->pathMap['@halo'] = '@theme';
        }
        Yii::$app->layoutPath = '@theme/layouts'; 
    }
    
    
}
  
?>
