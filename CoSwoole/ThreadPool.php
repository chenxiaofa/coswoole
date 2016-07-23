<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 14:14
 */

class ThreadPool
{
	public $maxThread = 100;
	public $startThread = 5;
	private $threads = [];
	private $freeThreads = [];
	protected $threadNum = 0;

	public function __construct($start,$max)
	{
		$this->maxThread = $max;
		$this->startThread = $start;
		$this->initThread();
	}

	public function initThread()
	{
		for($i=0;$i<$this->startThread;$i++)
		{
			$this->newThread();
		}
	}

	/**
	 *
	 */
	private function newThread()
	{
		$thread = new WebThread();
		$this->freeThreads[] = $thread;
		$this->threads[] = $thread;
		$this->threadNum++;
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