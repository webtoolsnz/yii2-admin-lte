[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/webtoolsnz/yii2-admin-lte/master.svg?style=flat-square)](https://travis-ci.org/webtoolsnz/yii2-admin-lte)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/webtoolsnz/yii2-admin-lte.svg?style=flat-square)](https://scrutinizer-ci.com/g/webtoolsnz/yii2-admin-lte/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/webtoolsnz/yii2-admin-lte.svg?style=flat-square)](https://scrutinizer-ci.com/g/webtoolsnz/yii2-admin-lte)

Yii2 Integration kit for AdminLTE theme
================================

The purpose of this project is to allow easy integration of the popular bootstrap theme [AdminLTE](https://github.com/almasaeed2010/adminlte)
for any Yii2 based applications.

!["AdminLTE Presentation"] (http://i.imgur.com/YOyqDPa.png "AdminLTE Presentation")

## Installation

Install `webtoolsnz/yii2-admin-lte` using Composer.

```bash
$ composer require webtoolsnz/yii2-admin-lte
```
## Getting started

This packages consists of a Theme and a set of widgets, each can be used independently of the other.

You can just use the widgets and completely ignore the theme component of this package, check the documentation
for each individual widget below.

### Available Widgets

- Box
- InfoBox
- ProgressInfoBox
- [Alert](docs/alerts.md)
- Callout
- Menu
- GridBox
- [FlashMessages](docs/flashmessages.md)


### Theme
Getting started with the Theme is really simple just the components section of your web application config with the following

```php

[
    ...
    'components' => [
        'view' => [
            'theme' => [
                'class' => \webtoolsnz\AdminLte\Theme::className(),
            ]
        ]
    ]
    ...
]
```
If you have any layout files named `main.php` those will need to be removed or renamed, as they will override the provided layout files, read more about [theme configuration](docs/theme.md)

## Testing

This project has a [PHPUnit](https://phpunit.de) test suite. To run the tests, run the following command from the project folder.

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.

