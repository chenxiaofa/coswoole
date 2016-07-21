<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:30
 */

class CoSwoole
{
	public static function msSleep($u)
	{
		$thread = \Coroutine::running();
		\swoole_timer_after($u,function()use($thread){
			$thread->resume();
		});
		\Coroutine::yield();
	}
}