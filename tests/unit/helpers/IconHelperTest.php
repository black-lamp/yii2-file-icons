<?php
/**
 * @link https://github.com/black-lamp/yii2-file-icons
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit\helpers;

use yii\helpers\Html;

use tests\unit\TestCase;

use bl\files\icons\helpers\IconHelper;

/**
 * Test case for Icon helper
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class IconHelperTest extends TestCase
{
    public function testIcon()
    {
        $expected = Html::tag('i', '', ['class' => 'file-test']);
        $actual = IconHelper::icon('test');

        $this->assertEquals($expected, $actual, 'Method should returns icon');
    }

    public function testIconTwoHtmlClass()
    {
        $expected = Html::tag('i', '', ['class' => 'test-class file-test']);
        $actual = IconHelper::icon('test', ['class' => 'test-class']);

        $this->assertEquals($expected, $actual, 'Method should append HTML class');
    }
}