<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 14:14
 */

namespace coswoole\base;


class ThreadPool extends ConfigurableObject
{
	public $maxThread = 100;
	public $startThread = 5;
	private $threads = [];
	private $free_threads = [];
	protected $thread_num = 0;
	public $threadClass = 'coswoole\\base\\CoThread';
	public function init()
	{
		for($i=0;$i<$this->startThread;$i++)
		{
			$this->incr_thread();
		}
		parent::init();
	}

	private function incr_thread()
	{
		$thread = new $this->threadClass();
		$this->free_threads[] = $thread;
		$this->threads[] = $thread;
		$this->thread_num++;
	}

}