<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:36
 */
if (!defined('COSWOOLE_PATH'))
{
	define('COSWOOLE_PATH',__DIR__);
}

/**
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {
	if (strpos('coswoole',$class,0) == 0)
	{
		$filePath = COSWOOLE_PATH.'/';
		$absPath = explode('\\',$class);
		array_shift($absPath);
		$fileName = array_pop($absPath);
		while (count($absPath)>0)
		{
			$filePath .= array_shift($absPath).'/';
		}
		$filePath.=$fileName.'.php';

		if (file_exists($filePath))
		{
			require_once $filePath;
		}
	}
});