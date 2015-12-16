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

use Yii;
use admin\events\Menu;

class Plugin extends \system\BasePlugin
{
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
}
