<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:32
 */

namespace coswoole\base;


class CoThread extends \Coroutine
{
	public function __construct($callable=NULL)
	{
		if ($callable===NULL)
		{
			$callable = function(){};
		}
		parent::__construct($callable);
	}
}