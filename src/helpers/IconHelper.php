<?php
/**
 * @link https://github.com/black-lamp/yii2-file-icons
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\files\icons\helpers;

use yii\helpers\Html;

/**
 * Class provides a static method for add icon
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class IconHelper
{
    /**
     * Returns icon
     *
     * @param string $name
     * @param array $options
     * @return string
     */
    public static function icon($name, $options = [])
    {
        Html::addCssClass($options, 'file-' . $name);

        return Html::tag('i', '', $options);
    }
}