<?php

namespace coswoole\app;

/**
 * User: 陈晓发
 * Date: 2016/7/21
 * Time: 9:50
 */
class HttpRequestHandler extends \coswoole\web\HttpRequestHandler
{
	public function run()
	{
		$s = microtime(1);
		\CoSwoole::msSleep(1000);
		$this->response->end(microtime(1)-$s);
	}
}