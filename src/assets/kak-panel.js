(function (root, factory) {
    if (typeof exports === 'object') {
        module.exports = factory();
    }
    else if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    }
    else {
        factory(root.jQuery);
    }
}(this, function ($) {
    'use strict';
    var isSlimPanel = typeof $.fn.slimScroll !== 'undefined';
    var kakPanel = function (element, options) {
        this.$parent = $(element);
        if (isSlimPanel) {
            this.$parent.find('.slimScrollPanel').slimScroll({});
        }
    };

    kakPanel.prototype = {
        constructor: kakPanel
    };

    $.fn.kakPanel = function (option) {
        var options = typeof option == 'object' && option;
        new kakPanel(this, options);
        return this;
    };
    $.fn.kakPanel.Constructor = kakPanel;

    $('.kak-panel').each(function (k, i) {
        $(i).kakPanel();
    });
}));