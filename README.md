File icons widget for Yii2
===========================
Widget for getting the font-icon for file extension

[![Build Status](https://travis-ci.org/black-lamp/yii2-file-icons.svg?branch=master)](https://travis-ci.org/black-lamp/yii2-file-icons)
[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-file-icons/v/stable)](https://packagist.org/packages/black-lamp/yii2-file-icons)
[![Latest Unstable Version](https://poser.pugx.org/black-lamp/yii2-file-icons/v/unstable)](https://packagist.org/packages/black-lamp/yii2-file-icons)
[![License](https://poser.pugx.org/black-lamp/yii2-file-icons/license)](https://packagist.org/packages/black-lamp/yii2-file-icons)

Installation
------------
Run command
```
composer require black-lamp/yii2-file-icons
```
or add
```json
"black-lamp/yii2-file-icons": "dev-master"
```
to the require section of your composer.json.

Using
-----
Example of using
```php
$widget = \bl\files\icons\FileIconWidget::begin([
    'icons' => [
        'txt' => [
            'icon' => \yii\helpers\Html::tag('i', '', ['class' => 'icon-file-txt'])
        ],
        'groups' => [
            [
                'extensions' => ['jpg', 'png', 'gif'],
                'icon' => \yii\helpers\Html::tag('i', '', ['class' => 'icon-picture'])
            ],
        ]
    ]
]);
echo $widget->getIcon('image.jpg');
$widget->end();
```
Method `FileIconWidget::getIcon()` takes file extension, file name or full path to file and returns
icon for file extension. Icon - method gets from configuration array. If icon not found in configuration array
method returns empty icon. Empty icon value gets from `emptyIcon` widget option.
### Widget configuration properties
| Option | Description | Type | Default |
|----|----|----|----|
|icons|Array with configuration for file extensions and icons|array|-|
|useDefaultIcons|If set `true` - widget will be user default icons for files|boolean|false|
|emptyIcon|If icon will not be found if `icons` array or in defaul icons set - value from this property will be returned|string|'Icon for this extension not found!'|

### Default icon set
If you set widget option `useDefaultIcons` in `true` - method `FileIconWidget::getIcon()` will be returns
default icons for file extensions. Also you can override default icons if you dont't wont to use default icon
for curren file extension.
![Default icon set](/docs/images/icons.png "Default icon set")
```html
<i class="file-text"></i>
<i class="file-pdf"></i>
<i class="file-power-point"></i>
<i class="file-archive"></i>
<i class="file-word"></i>
<i class="file-excel"></i>
<i class="file-picture"></i>
<i class="file-video"></i>
<i class="file-code"></i>
```
or using `\bl\files\icons\helpers\IconHelper`
```php
IconHelper::icon('text');
IconHelper::icon('pdf');
IconHelper::icon('power-point');
IconHelper::icon('archive');
IconHelper::icon('word');
IconHelper::icon('excel');
IconHelper::icon('picture');
IconHelper::icon('video');
IconHelper::icon('code');
```