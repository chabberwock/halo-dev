<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace halo\devtools\generators\plugin;

use yii\gii\CodeFile;
use yii\helpers\Html;
use Yii;
use yii\helpers\StringHelper;

/**
 * This generator will generate the skeleton code needed by a module.
 *
 * @property string $controllerNamespace The controller namespace of the module. This property is read-only.
 * @property boolean $modulePath The directory that contains the module class. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\Generator
{
    public $vendorID;
    public $pluginID;
    public $name;
    public $author;
    public $description;
    public $homepage;
    public $icon;
    public $buildConsole;
    public $buildAdmin;
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Halo Plugin';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'Creates skeleton Halo Plugin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['vendorID', 'pluginID'], 'filter', 'filter' => 'trim'],
            [['vendorID', 'pluginID'], 'required'],
            [['buildConsole','buildAdmin'], 'safe'],
            [['description','author','icon','homepage','name'], 'string'],
            [['vendorID','pluginID'], 'match', 'pattern' => '/^[a-z]+$/', 'message' => 'Only lowercase letters allowed'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [
            'vendorID' => 'Your vendor name, used as a root namespace alias in Yii',
        ];
    }
    
    public function fullID()
    {
//        return $this->vendorID . '.' . $this->pluginID;    
        return $this->pluginID;    
    }
    
    public function ns()
    {
        return $this->vendorID . '\\' . $this->pluginID;
    }

    /**
     * @inheritdoc
     */
    public function successMessage()
    {
        return 'Plugin has been generated successfully';
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return ['plugin.php', 'controller.php', 'view.php', 'info.php', 
        'config.php', 'config-admin.php', 'config-console.php', 'console-controller.php', 'bootstrap.php', 
        'admin/controller.php', 'admin/module.php', 'admin/view.php'];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        
        $modulePath = Yii::$app->pluginManager->pluginPath . '/' . $this->vendorID . '/' . $this->pluginID;
        
        $files[] = new CodeFile(
            $modulePath . '/plugin.json',
            $this->render("info.php")
        );

        $files[] = new CodeFile(
            $modulePath . '/Bootstrap.php',
            $this->render("bootstrap.php")
        );

        $files[] = new CodeFile(
            $modulePath . '/Plugin.php',
            $this->render("plugin.php")
        );
        
        $files[] = new CodeFile(
            $modulePath . '/controllers/DefaultController.php',
            $this->render("controller.php")
        );
        
        $files[] = new CodeFile(
            $modulePath . '/views/default/index.php',
            $this->render("view.php")
        );

        $files[] = new CodeFile(
            $modulePath . '/config.php',
            $this->render("config.php")
        );

        if ($this->buildAdmin) {
            $files[] = new CodeFile(
                $modulePath . '/config-admin.php',
                $this->render("config-admin.php")
            );
            $files[] = new CodeFile(
                $modulePath . '/admin/Module.php',
                $this->render("admin/module.php")
            );
            $files[] = new CodeFile(
                $modulePath . '/admin/controllers/DefaultController.php',
                $this->render("admin/controller.php")
            );
            $files[] = new CodeFile(
                $modulePath . '/admin/views/default/index.php',
                $this->render("admin/view.php")
            );
        }
        
        if ($this->buildConsole) {
            $files[] = new CodeFile(
                $modulePath . '/commands/DefaultController.php',
                $this->render("console-controller.php")
            );
            
        }

        
        return $files;
    }

    /**
     * Validates [[moduleClass]] to make sure it is a fully qualified class name.
     */
    public function validateModuleClass()
    {
        if (strpos($this->moduleClass, '\\') === false || Yii::getAlias('@' . str_replace('\\', '/', $this->moduleClass), false) === false) {
            $this->addError('moduleClass', 'Module class must be properly namespaced.');
        }
        if (empty($this->moduleClass) || substr_compare($this->moduleClass, '\\', -1, 1) === 0) {
            $this->addError('moduleClass', 'Module class name must not be empty. Please enter a fully qualified class name. e.g. "app\\modules\\admin\\Module".');
        }
    }

}
