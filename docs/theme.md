Theme Configuration
====

This document will cover some of the more advanced features of the yii2-admin-lte theme.

1. [Skins](#skins)
2. [Navigation](#navigation)
3. [Asset Bundles](#assets-bundles)
4. [Overriding Layouts](#overriding-layouts)
5. [Custom PathMap](#custom-pathmap)

## Skins

The [AdminLte](https://github.com/almasaeed2010/adminlte) theme provides a number of preconfigured skins, these are supported by simply setting the `skin` attribute of the `Theme` like below.

```php
'view' => [
    'theme' => [
        'class' => \webtoolsnz\AdminLte\Theme::className(),
        'skin' => \webtoolsnz\AdminLte\Theme::SKIN_GREEN,
    ]
]
```

Setting the `skin` attribute of the theme will do two things, it will load an extra css file for the given skin, and it will add an extra css class to the `<body>` tag of the layout.

The following skin constants are currently available:

- `\webtoolsnz\AdminLte\Theme::SKIN_BLACK`
- `\webtoolsnz\AdminLte\Theme::SKIN_BLACK_LIGHT`
- `\webtoolsnz\AdminLte\Theme::SKIN_BLUE`
- `\webtoolsnz\AdminLte\Theme::SKIN_BLUE_LIGHT`
- `\webtoolsnz\AdminLte\Theme::SKIN_RED`
- `\webtoolsnz\AdminLte\Theme::SKIN_RED_LIGHT`
- `\webtoolsnz\AdminLte\Theme::SKIN_GREEN`
- `\webtoolsnz\AdminLte\Theme::SKIN_GREEN_LIGHT`
- `\webtoolsnz\AdminLte\Theme::SKIN_YELLOW`
- `\webtoolsnz\AdminLte\Theme::SKIN_YELLOW_LIGHT`
- `\webtoolsnz\AdminLte\Theme::SKIN_PURPLE`
- `\webtoolsnz\AdminLte\Theme::SKIN_PURPLE_LIGHT`

To get an idea of what they look like checkout the preview site [here](https://almsaeedstudio.com/preview).

## Navigation

By default the theme supports two menus, the main navigation appears in the sidebar on the left,
the top/supplemental navigation appears at the top right of the screen.

The theme provides a simple interface for configuring these menu items, of course there is nothing stopping you from 
overriding the `sidebar.php` or `header.php` layout files and implementing the navigation however you like.

### Main Menu

Simply set the `mainMenuItems` property on the theme in order to populate the main menu

The main menu is rendered using the `\webtoolsnz\AdminLte\widgets\Menu` check the [documentation for that widget](menu.md) for a more details.

### Top Menu

Simply set the `topMenuItems` property on the theme in order to populate that menu.

The top menu is rendered using the `yii\bootstrap\Nav` widget, see the official documentation for more details



### Module Menu Example

Here's an example of configuring the menus for a given module.

```php

class Module extends \yii\base\Module
{
    /**
     * @param \yii\base\Action $event
     * @return bool
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $theme = \Yii::$app->view->theme;
        $theme->mainMenuItems = $this->getMenuItems($action);
        $theme->topMenuItems = $this->getTopMenuItems($action);

        return true;
    }

    /**
     * @param $context
     * @return array
     */
    public function getMenuItems($action)
    {
        return [
            [
                'label' => 'MAIN NAVIGATION',
            ],
            [
                'icon' => 'glyphicon glyphicon-home',
                'label' => 'Dashboard',
                'url' => ['/admin/'],
                'active' => $action->controller->id == 'default',
            ],
            [
                'icon' => 'glyphicon glyphicon-user',
                'label' => 'Users',
                'url' => ['/admin/user'],
                'active' => $action->controller->id == 'user',
            ],
        ];
    }

    public function getTopMenuItems($action)
    {
        return [
            [
                'label' => '<span class="glyphicon glyphicon-log-out"></span> Logout',
                'url' => ['/logout'],
                'encode' => false,
            ],
        ];
    }
}
```




## Asset Bundles

You will most likely need to register your own AssetBundles along side the provided AdminLTE ones, there are multiple ways to do this the easiest is to register a `beforeRender` event handler on your view component, this is trivial to do:

```php
'view' => [
    'theme' => [
        'class' => \webtoolsnz\AdminLte\Theme::className(),
        'skin' => \webtoolsnz\AdminLte\Theme::SKIN_GREEN,
    ],
    'on beforeRender' => function (\yii\base\ViewEvent $event) {
        \app\assets\AppAsset::register(Yii::$app->getView());
    }
]
```

Another approach is to override some of the layout and register your asset bundles there.

## Overriding Layouts

The way `yii2-admin-lte` is built allows you to override parts of the layout eg. `sidebar` or even the entire layout if you like, they layout view files are structured in the following hierarchy:

```bash
main.php
├── head.php
├── header.php
├── sidebar.php
├── content-header.php
└── footer.php
``` 

For example if you wanted to override the footer with your own, you can create a new file `views/layouts/footer.php` it will automatically be used instead of the provided `footer.php` view. The same goes for all parts of the layout, you can even override the `main.php` layout this way.


## Custom PathMap

The default configuration of this theme assumes a single-tier application similar to the official [yii2-app-basic](https://github.com/yiisoft/yii2-app-basic) template, with a single `@app` alias pointing to the root of the project.

If your application is multi-tiered, like the [yii2-app-advanced](https://github.com/yiisoft/yii2-app-advanced) template, where there are two aliases `@backend` and `@frontend` you can configure the theme to work like this.

If you want to apply the theme to the backend app you can simply configure a different alias for the them like so:

```php
'view' => [
    'theme' => [
        'class' => \webtoolsnz\AdminLte\Theme::className(),
        'root' => '@backend'
    ]
]
```

If this does not provide enough flexibility for your configuration you can provide your own `pathMap` instead:

```php
'view' => [
    'theme' => [
        'class' => \webtoolsnz\AdminLte\Theme::className(),
        'pathMap' => [
        	'@foo/views' => [
        		'@bar/views',
        		'/path/to/some/layouts/'
        	]
        ],
    ]
]
```

Checkout the [official guide](http://www.yiiframework.com/doc-2.0/guide-output-theming.html#theme-inheritance) for more information about theme inheritance and pathMap.




