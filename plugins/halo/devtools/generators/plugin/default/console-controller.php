<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";

$ns = $generator->vendorID . '\\' . $generator->pluginID . '\\commands';

?>

namespace <?= $ns ?>;

use Yii;
use yii\console\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        echo 'Hello';
    }
}
