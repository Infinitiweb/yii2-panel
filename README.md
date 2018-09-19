# infinitiweb-panel

Yii panel-widget
================

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist infinitiweb/yii2-panel "dev-master"
```

or add

```
"infinitiweb/yii2-panel": "dev-master"
```

to the require section of your `composer.json` file.

Usage
-----

```php
<?php
use infinitiweb\widgets\yii2\panel\Panel;

Panel::begin([
    'title' =>  'Update',
    'heading' => true,                                         
])?>

<!-- content -->

<?php Panel::end();?>

```

Or

```php
<?php

use infinitiweb\widgets\yii2\panel\Panel;

echo Panel::widget([
    'title' => 'Title',
    'content' => ''
]);
?>
```
