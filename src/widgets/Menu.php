<?php
/**
 * This file is part of the webtoolsnz\AdminLte library
 *
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/webtoolsnz/yii2-admin-lte
 * @package webtoolsnz/yii2-admin-lte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace webtoolsnz\AdminLte\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Class Menu
 * @package webtoolsnz\AdminLte\widgets
 */
class Menu extends \yii\widgets\Menu
{
    /**
     * @inheritdoc
     */
    public $linkTemplate = '<a href="{url}">{icon} {label}</a>';

    /**
     * @var string
     */
    public $linkWithChildrenTemplate = '<a href="{url}">{icon} {label} <i class="fa fa-angle-left pull-right"></i></a>';

    /**
     * @var string
     */
    public $submenuTemplate = '<ul class="treeview-menu {open}">{items}</ul>';

    /**
     * @var bool
     */
    public $activateParents = true;

    /**
     * @inheritdoc
     */
    protected function renderItem($item)
    {
        return isset($item['url']) ? $this->renderLink($item) : $item['label'];
    }

    /**
     * @param array $item
     * @return string
     */
    protected function renderLink($item)
    {
        $template = ArrayHelper::getValue($item, 'linkTemplate',
            isset($item['items']) ? $this->linkWithChildrenTemplate : $this->linkTemplate);

        $placeholders = [
            '{url}' => Url::to($item['url']),
            '{label}' => '<span>' . $item['label'] . '</span>',
            '{icon}' => isset($item['icon']) ? '<i class="' . $item['icon'] . '"></i>' : '',
        ];

        return strtr($template, $placeholders);
    }

    /**
     * Generates options for the item
     *
     * @param $items
     * @param $index
     * @return array
     */
    protected function getItemOptions($items, $index)
    {
        $n = count($items);
        $item = $items[$index];

        $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));

        $class = [];

        if ($item['active']) {
            $class[] = $this->activeCssClass;
        }
        if ($index === 0 && $this->firstItemCssClass !== null) {
            $class[] = $this->firstItemCssClass;
        }
        if ($index === $n - 1 && $this->lastItemCssClass !== null) {
            $class[] = $this->lastItemCssClass;
        }

        if (isset($item['items'])) {
            $class[] = 'treeview';
        }

        if (!isset($item['url'])) {
            $class[] = 'header';
        }

        Html::addCssClass($options, $class);

        return $options;
    }

    /**
     * @inheritdoc
     */
    protected function renderItems($items)
    {
        $lines = [];
        foreach ($items as $i => $item) {
            $options = $this->getItemOptions($items, $i);
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $menu = $this->renderItem($item);

            if (!empty($item['items'])) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                    '{open}' => $item['active'] ? 'menu-open' : '',
                ]);
            }

            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode(PHP_EOL, $lines);
    }



    /**
     * @inheritdoc
     */
    protected function normalizeItems($items, &$active)
    {
        $items = parent::normalizeItems($items, $active);

        foreach ($items as $i => $item) {
            $items[$i]['icon'] = ArrayHelper::getValue($item, 'icon', '');

            if (isset($item['items']) && !isset($item['url'])) {
                $items[$i]['url'] = '#';
            }
        }

        return $items;
    }
}
