<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

$ns = $generator->vendorID . '\\' . $generator->pluginID;

echo "<?php\n";
?>

namespace <?= $ns ?>;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->on('admin.mainMenu', ['<?= $ns ?>\admin\Module','onAdminMainMenu']);
        $app->on('admin.contentMenu', ['<?= $ns ?>\admin\Module','onAdminContentMenu']);
        $app->on('admin.settingsMenu', ['<?= $ns ?>\admin\Module','onAdminSettingsMenu']);
    }
    
}