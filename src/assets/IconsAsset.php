<?php
namespace bl\files\icons\assets;

use yii\web\AssetBundle;

/**
 * Asset for default file icons
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class IconsAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/black-lamp/yii2-file-icons/src/assets/src';
    /**
     * @inheritdoc
     */
    public $css = [
        'css/style.css'
    ];
}
