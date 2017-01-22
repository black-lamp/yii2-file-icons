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