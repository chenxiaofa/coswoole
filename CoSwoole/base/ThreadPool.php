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
	private $freeThreads = [];
	protected $threadNum = 0;
	public $threadClass = 'coswoole\\base\\CoThread';
	public function init()
	{
		for($i=0;$i<$this->startThread;$i++)
		{
			$this->newThread();
		}
		parent::init();
	}

	/**
	 *
	 */
	private function newThread()
	{
		$thread = new $this->threadClass();
		$this->freeThreads[] = $thread;
		$this->threads[] = $thread;
		$this->threadNum++;
		$thread->threadPool = $this;
	}

	/**
	 * @return bool|mixed
	 */
	public function getFreeThread()
	{
		if (empty($this->freeThreads))
		{
			if ( $this->threadNum >= $this->maxThread)
			{
				return false;
			}
			$this->newThread();
		}
		return array_pop($this->freeThreads);
	}


	public function releaseThread($thread)
	{
		$this->freeThreads[] = $thread;
	}

}