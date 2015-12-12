<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace halo\admin\widgets;

use halo\admin\AdminModule;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Yii;

class Menu extends \dmstr\widgets\Menu
{
    public $options = ['class' => 'sidebar-menu'];
    public $linkTemplate = '<a href="{url}">{icon} {label} {extra}</a>';
    
    protected function renderItem($item)
    {
        if(isset($item['items']))
            $linkTemplate = '<a href="{url}">{icon} {label} <i class="fa fa-angle-left pull-right"></i></a>';
        else
            $linkTemplate = $this->linkTemplate;
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $linkTemplate);
            $replace = !empty($item['icon']) ? [
                '{url}' => Url::to($item['url']),
                '{label}' => '<span>'.$item['label'].'</span>',
                '{icon}' => '<i class="' . $item['icon'] . '"></i> '
            ] : [
                '{url}' => Url::to($item['url']),
                '{label}' => '<span>'.$item['label'].'</span>',
                '{icon}' => null,
            ];
            
            if (isset($item['success'])) {
                $replace['{extra}'] = '<span class="label label-success">' . $item['success'] . '</span>';
            } elseif (isset($item['info'])) {
                $replace['{extra}'] = '<span class="label label-info">' . $item['info'] . '</span>';
            } elseif (isset($item['primary'])) {
                $replace['{extra}'] = '<span class="label label-info">' . $item['primary'] . '</span>';
            } elseif (isset($item['warning'])) {
                $replace['{extra}'] = '<span class="label label-info">' . $item['warning'] . '</span>';
            } elseif (isset($item['danger'])) {
                $replace['{extra}'] = '<span class="label label-info">' . $item['warning'] . '</span>';
            } else {
                $replace['{extra}'] = null;
            }            
            
            return strtr($template, $replace);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
            $replace = !empty($item['icon']) ? [
                '{label}' => '<span>'.$item['label'].'</span>',
                '{icon}' => '<i class="' . $item['icon'] . '"></i> '
            ] : [
                '{label}' => '<span>'.$item['label'].'</span>',
            ];
            return strtr($template, $replace);
        }
    }
    
}
?>
