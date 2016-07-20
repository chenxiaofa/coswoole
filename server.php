<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:28
 */

require 'CoSwoole/autoload.php';

$config = require __DIR__.'/app/config/web.php';

$app = new coswoole\web\Application($config);

print_r($app);