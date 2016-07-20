<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:27
 */

namespace coswoole\base;


class Application extends ConfigurableObject
{
	public $asyncMysql = null;
	public $threadPool = null;
}