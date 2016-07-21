<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:28
 */

require 'CoSwoole/autoload.php';
require 'CoSwoole/CoSwoole.php';

$config = require __DIR__ . '/CoSwoole/app/config/web.php';

$app = new coswoole\web\Application($config);

$app->run();

echo 'run\n';