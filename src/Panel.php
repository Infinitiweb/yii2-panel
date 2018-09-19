<?php

namespace infinitiweb\widgets\yii2\panel;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/**
 * Class Panel
 * @package infinitiweb\widgets\yii2\panel
 */
class Panel extends Widget
{
    const PANEL_CLASS = 'infiniti-panel';
    const PANEL_FOOTER_CLASS = 'panel-footer';
    const PANEL_BODY_CLASS = 'panel-body';
    const PANEL_HEADING_CLASS = 'panel-heading';
    const SLIM_SCROLL_DATA_KEY = 'data-slim';
    const SLIM_SCROLL_PANEL_CLASS = 'slimScrollPanel';
    const PANEL_INVERSE_CLASS = 'panel-inverse';

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /** @var array */
    public $bodyOptions = [];
    /** @var  string the panel-title */
    public $title;
    /** @var bool */
    public $heading = true;
    /** @var */
    public $content;
    /** @var */
    public $header;
    /** @var */
    public $footer;
    /** @var bool */
    public $slimScroll = false;
    /** @var array */
    public $slimOptions = [];

    public function init(): void
    {
        $this->initOptions();

        echo Html::beginTag('div', $this->options);
        if ($this->heading) {
            echo Html::tag(
                'div',
                sprintf('%s%s', Html::tag('h4', $this->title), $this->header),
                ['class' => self::PANEL_HEADING_CLASS]
            );
        }
        Html::addCssClass($this->bodyOptions, self::PANEL_BODY_CLASS);
        echo Html::beginTag('div', $this->bodyOptions);
        echo $this->content;
    }

    /**
     * @return string|void
     */
    public function run(): void
    {
        echo Html::endTag('div');

        if ($this->footer !== null) {
            echo Html::tag('div', $this->footer, ['class' => self::PANEL_FOOTER_CLASS]);
        }
        echo Html::endTag('div');
    }

    /**
     * @param string $attrName
     * @param array $options
     * @return array
     */
    private function prepareOptionsToAttr(string $attrName, array $options = []): array
    {
        $strArr = [];
        foreach ($options as $key => $option) {
            $strArr[sprintf('%s-%s', $attrName, $key)] = $option;
        }

        return $strArr;
    }

    private function initOptions(): void
    {
        /** @var View $view */
        $view = $this->getView();

        if ($this->slimScroll) {
            $this->bodyOptions = ArrayHelper::merge($this->bodyOptions, $this->prepareOptionsToAttr(self::SLIM_SCROLL_DATA_KEY, $this->slimOptions));
            Html::addCssClass($this->bodyOptions, self::SLIM_SCROLL_PANEL_CLASS);
            SlimScrollAsset::register($view);
        }

        if (!array_key_exists('id', $this->options)) {
            $this->options['id'] = $this->getId();
        }
        if (!array_key_exists('class', $this->options)) {
            $this->options['class'] = self::PANEL_INVERSE_CLASS;
        }

        Html::addCssClass($this->options, sprintf('panel %s', self::PANEL_CLASS));
        PanelAsset::register($view);
    }
}
