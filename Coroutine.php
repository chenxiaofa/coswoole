<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:25
 */

class Coroutine
{
	const STATUS_SUSPEND = 0;
	const STATUS_RUNNING = 1;
	const STATUS_DEAD = 2;
	public function __construct($callback){}
	public $status = 0;
	public static function yield(){}

	/**
	 * @return static
	 */
	public static function running(){}
	public function resume(){}
	public function reset(){}

}