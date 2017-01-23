<?php
/**
 * @link https://github.com/black-lamp/yii2-file-icons
 * @copyright Copyright (c) 2017 Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\files\icons;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use bl\files\icons\assets\IconsAsset;

/**
 * Widget for getting the font-icon for file extension
 *
 * @property array $icons
 * @property boolean $useDefaultIcons
 * @property string $emptyIcon
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class FileIconWidget extends Widget
{
    /**
     * @var array Configuration array for file extensions and icons
     * Example
     * ```php
     * [
     *      'jpg' => [
     *          'icon' => \yii\helpers\Html::tag('i', '', ['class' => 'icon-image'])
     *      ],
     *      'mp3' => [
     *          'icon' => \yii\helpers\Html::tag('i', '', ['class' => 'icon-music'])
     *      ],
     * ]
     * ```
     */
    public $icons = [];
    /**
     * @var boolean If set `true` for file extensions will be returned default icons
     */
    public $useDefaultIcons = false;
    /**
     * @var string Default icon. Set if icon not found in $icons array
     */
    public $emptyIcon = null;

    /**
     * @var array Array of default icons
     */
    protected $defaultIcons = [];


    /**
     * @inheritdoc
     */
    public function init()
    {
        $emptyIconValue = 'Icon for this extension not found!';
        if ($this->useDefaultIcons) {
            $this->initDefaultIcons();

            $emptyIconValue = Html::tag('i', '', ['class' => 'file-empty']);
            IconsAsset::register($this->getView());
        }

        if (is_null($this->emptyIcon)) {
            $this->emptyIcon = $emptyIconValue;
        }
    }

    /**
     * Init array with default icons
     */
    protected function initDefaultIcons()
    {
        $this->defaultIcons = [
            'txt' => [
                'icon' => Html::tag('i', '', ['class' => 'file-text'])
            ],
            'pdf' => [
                'icon' => Html::tag('i', '', ['class' => 'file-pdf'])
            ],
            'groups' => [
                [
                    'extensions' => ['ppt', 'pptx'],
                    'icon' => Html::tag('i', '', ['class' => 'file-power-point'])
                ],
                [
                    'extensions' => ['doc', 'docx'],
                    'icon' => Html::tag('i', '', ['class' => 'file-word'])
                ],
                [
                    'extensions' => ['xls', 'xlsx'],
                    'icon' => Html::tag('i', '', ['class' => 'file-excel'])
                ],
                [
                    'extensions' => ['jpg', 'jpeg', 'png', 'gif', 'ico'],
                    'icon' => Html::tag('i', '', ['class' => 'file-picture'])
                ],
                [
                    'extensions' => ['mp3', 'ogg'],
                    'icon' => Html::tag('i', '', ['class' => 'file-music'])
                ],
                [
                    'extensions' => ['mp4', 'flv'],
                    'icon' => Html::tag('i', '', ['class' => 'file-video'])
                ],
                [
                    'extensions' => ['zip', '7z', 'rar'],
                    'icon' => Html::tag('i', '', ['class' => 'file-archive'])
                ],
                [
                    'extensions' => ['php', 'html', 'css', 'js'],
                    'icon' => Html::tag('i', '', ['class' => 'file-code'])
                ],
            ]
        ];
    }

    /**
     * Get icon from configuration array
     *
     * @param array $array Configuration array
     * @param string $extension File extension
     * @return string
     */
    protected function iconFromArray($array, $extension)
    {
        $icon = null;
        if (ArrayHelper::keyExists($extension, $array)) {
            $icon = $array[$extension]['icon'];
        }
        elseif (ArrayHelper::keyExists('groups', $array)) {
            foreach ($array['groups'] as $group) {
                if (ArrayHelper::isIn($extension, $group['extensions'])) {
                    $icon = $group['icon'];
                    break;
                }
            }
        }

        return $icon;
    }

    /**
     * Get icon by file extension
     *
     * @param string $file File extension or file name or path to file
     * @return string returns icon from $icons array or $emptyIcon
     */
    public function getIcon($file)
    {
        $extension = $file;
        if ($index = strrpos($file, '.')) {
            $extension = substr($file, $index + 1);
        }

        $icon = $this->iconFromArray($this->icons, $extension);
        if ($this->useDefaultIcons && empty($icon)) {
            $icon = $this->iconFromArray($this->defaultIcons, $extension);
        }

        return (!empty($icon)) ? $icon : $this->emptyIcon;
    }
}
