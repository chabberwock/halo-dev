<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

$ns = $generator->vendorID . '\\' . $generator->pluginID . '\\' . 'admin';

echo "<?php\n";
?>

namespace <?= $ns ?>;

use Yii;
use halo\admin\events\Menu;

class Module extends \halo\system\BasePlugin
{
    public function init()
    {
        parent::init();
        
        Yii::$app->view->params['sidebarMenu'] = [
            ['label'=>'Dashboard', 'url'=>['/halo.admin/<?= $generator->fullId() ?>.admin/'], 'icon'=>'fa fa-home']
        ];
    }
    
    // Displays plugin link in the header. Event attached in Bootstrap.php
    public static function onAdminMainMenu(Menu $event)
    {
        $event->items[] = ['label'=>'<?= $generator->name ?>', 'url'=>['/halo.admin/<?= $generator->fullId() ?>.admin/'], 'icon'=>'<?= $generator->icon ?>'];
    }

    // displays plugin link in the content section of admin. Event attached in Bootstrap.php
    public static function onAdminContentMenu(Menu $event)
    {
        $event->items[] = ['label'=>'<?= $generator->name ?>', 'options' =>['class'=>'header']];        
        $event->items[] = ['label'=>'Dashboard', 'url'=>['/halo.admin/<?= $generator->fullId() ?>.admin/'], 'icon'=>'<?= $generator->icon ?>'];
    }

    // displays plugin link in the content section of admin. Event attached in Bootstrap.php
    public static function onAdminSettingsMenu(Menu $event)
    {
        $event->items[] = ['label'=>'<?= $generator->name ?>', 'options' =>['class'=>'header']];        
        $event->items[] = ['label'=>'Dashboard', 'url'=>['/halo.admin/<?= $generator->fullId() ?>.admin/'], 'icon'=>'<?= $generator->icon ?>'];
    }
    
}
