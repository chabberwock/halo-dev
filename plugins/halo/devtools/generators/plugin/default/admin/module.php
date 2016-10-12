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
use admin\events\Menu;

class Module extends \system\BasePlugin
{
    public function init()
    {
        parent::init();
        
        Yii::$app->view->params['sidebarMenu'] = [
            ['label'=>'Dashboard', 'url'=>[$this->uniqueId], 'icon'=>'fa fa-home']
        ];
    }
    
    // Configures admin interface. Event attached in Bootstrap.php
    public static function onAdminUi($event)
    {
        /** @var \admin\Ui */
        $ui = $event->sender;
        $main = $ui->menu('main');
        $main->add('<?= $generator->name ?>', ['/admin/<?= $generator->pluginID ?>'], '<?= $generator->icon ?>');
        
        $content = $ui->menu('content');
        $general = $content->item('general');
        $general->add('<?= $generator->name ?>', ['/admin/<?= $generator->pluginID ?>'], '<?= $generator->icon ?>');

        $settings = $ui->menu('settings');
        $general = $settings->item('general');
        $general->add('<?= $generator->name ?>', ['/admin/<?= $generator->pluginID ?>'], '<?= $generator->icon ?>');
    }

}
