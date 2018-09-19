<?php

namespace infinitiweb\widgets\yii2\panel;

use yii\web\AssetBundle;

/**
 * Class PanelAsset
 * @package infinitiweb\widgets\yii2\panel
 */
class PanelAsset extends AssetBundle
{
    /** @var string  */
    public $sourcePath = '@infinitiweb/widgets/yii2/panel/src/assets';

    /** @var array */
    public $js = [
        'kak-panel.js'
    ];

    /** @var array */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
