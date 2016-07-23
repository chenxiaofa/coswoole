<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:30
 */
include 'ThreadPool.php';
include 'WebThread.php';
class CoSwoole
{
	protected static $_config = [];
	protected static $_running = false;
	/** @var ThreadPool */
	protected static $_threadPoll = null;
	protected static $_server = null;
	public static function msSleep($u)
	{
		$thread = Coroutine::running();
		swoole_timer_after($u,function()use($thread){
			$thread->resume();
		});
		Coroutine::yield();
	}

	public static function run($config)
	{
		self::$_config = $config;


		$workerNum = getVar('workerNum',$config,1);
		$host = getVar('host',$config,'0.0.0.0');
		$port = getVar('port',$config,9502);

		self::$_server = new swoole_http_server($host, $port);
		self::$_server->on('Request','CoSwoole::onHttpRequest');
		self::$_server->on('WorkerStart','CoSwoole::onWorkerStart');
		self::$_server->set([
				'worker_num'=>$workerNum
		]);

		self::$_server->start();

	}

	public static function onWorkerStart()
	{
		$maxThread = getVar('maxThread',self::$_config,100);
		$startThread = getVar('maxThread',self::$_config,5);

		self::$_threadPoll = new ThreadPool($startThread,$maxThread);

	}

	/**
	 * @param $thread WebThread
	 */
	public static function resumeRequest($thread)
	{
		$thread->resume();
		if ($thread->status == $thread::STATUS_DEAD)
		{
			$thread->release();
			self::$_threadPoll->releaseThread($thread);
		}
	}

	/**
	 * @param $request
	 * @param $response
	 */
	public static function onHttpRequest($request, $response)
	{
		$thread = self::$_threadPoll->getFreeThread();
		if ($thread === false)
		{
			$response->end('buzy');
			return;
		}
		$thread->reset($request,$response);
		self::resumeRequest($thread);
	}

}

function getVar($key,$arr,$default=null)
{
	if (is_array($arr) && array_key_exists($key,$arr))
	{
		return $arr[$key];
	}
	return $default;
}