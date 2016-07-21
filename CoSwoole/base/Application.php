<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:27
 */

namespace coswoole\base;


abstract class Application extends ConfigurableObject
{
	public $asyncMysql = null;
	/** @var threadPool  */
	public $threadPool = null;

	abstract public function run();



}