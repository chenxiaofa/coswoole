<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:28
 */

require 'CoSwoole/CoSwoole.php';

$config = require __DIR__ . '/CoSwoole/web.php';

CoSwoole::run($config);


echo 'run\n';