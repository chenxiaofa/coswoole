<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:55
 */

namespace coswoole\web;


class Application extends \coswoole\base\Application
{
	public $host = '0.0.0.0';
	public $port = 9502;
	public $worker = 1;
	protected $swooleHttpServer = null;
	public function init()
	{
		$this->swooleHttpServer = new \swoole_http_server($this->host, $this->port);
		$this->swooleHttpServer->on('Request',[$this,'httpOnRequest']);
		$this->swooleHttpServer->set([
			'worker_num'=>$this->worker
		]);
	}

	public function httpOnRequest($request, $response)
	{
		/** @var \coswoole\base\CoThread $thread */
		$thread = $this->threadPool->getFreeThread();
		if ($thread === false)
		{
			$response->end('busy');
			return;
		}

		$thread->reset($request,$response);
		$thread->resume();


	}

	public function run()
	{
		$this->swooleHttpServer->start();
	}
}