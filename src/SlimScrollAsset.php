<?php

namespace infinitiweb\widgets\yii2\panel;

use yii\web\AssetBundle;

/**
 * Class SlimScrollAsset
 * @package infinitiweb\widgets\yii2\panel
 */
class SlimScrollAsset extends AssetBundle
{
    /** @var string */
    public $sourcePath = '@bower/slimscroll';

    /** @var array */
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    /** @var array */
    public $js = [
        'jquery.slimscroll.min.js'
    ];
}
