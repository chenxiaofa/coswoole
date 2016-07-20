<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:56
 */
return [
	'threadPool'=>[
		'class'=>\coswoole\base\ThreadPool::className(),
		'maxThread'=>100,
		'startThread'=>5,
	]
];