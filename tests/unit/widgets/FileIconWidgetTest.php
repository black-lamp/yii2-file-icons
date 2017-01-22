<?php
/**
 * @link https://github.com/black-lamp/yii2-file-icons
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace tests\unit;

use tests\unit\TestCase;

use bl\files\icons\FileIconWidget;

/**
 * Test case for FileIcon widget
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class FileIconWidgetTest extends TestCase
{
    /**
     * @var FileIconWidget
     */
    private $widget;


    /**
     * @inheritdoc
     */
    protected function _before()
    {
        $this->widget = FileIconWidget::begin([
            'useDefaultIcons' => true,
            'emptyIcon' => 'test empty icon',
            'icons' => [
                'test' => [
                    'icon' => 'test icon'
                ],
                'group' => [
                    [
                        'extensions' => ['test1', 'test2', 'test3'],
                        'icon' => 'test group icon'
                    ]
                ]
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        $this->widget->end();
    }

    public function testGetIconByExtension()
    {
        $expected = 'test icon';
        $actual = $this->widget->getIcon('test');

        $this->assertEquals($expected, $actual, 'Method must return a icon by file extension');
    }

    public function testGetIconFromGroup()
    {
        $expected = 'test group icon';
        $actual = $this->widget->getIcon('tes1');

        $this->assertEquals($expected, $actual, 'Method must return a icon from file group');

        $actual = $this->widget->getIcon('test2');
        $this->assertEquals($expected, $actual, 'Method must return a icon from file group');

        $actual = $this->widget->getIcon('test3');
        $this->assertEquals($expected, $actual, 'Method must return a icon from file group');
    }

    public function testGetEmptyIcon()
    {
        $expected = 'test empty icon';
        $actual = $this->widget->getIcon('undefined extension');

        $this->assertEquals($expected, $actual, 'Method must return a empty icon if extension not found');
    }

    public function testGetDefaultIcon()
    {
        $expected = Html::tag('i', '', ['class' => 'file-text']);
        $actual = $this->widget->getIcon('txt');

        $this->assertEquals($expected, $actual, 'Method must return a default icon');
    }

    public function testDefaultIconOption()
    {
        $expected = 'empty icon';

        $widget = FileIconWidget::begin([
            'useDefaultIcons' => false,
            'emptyIcon' => $expected
        ]);

        $actual = $widget->getIcon('txt');

        $this->assertEquals($expected, $actual, 'Method must return empty icon');
    }
}
