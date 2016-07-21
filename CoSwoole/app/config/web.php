<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 13:56
 */
return [
	'threadPool'=>[
		'class'=>\coswoole\base\ThreadPool::className(),
		'threadClass'=>'coswoole\web\WebThread',
		'maxThread'=>10000,
		'startThread'=>10000,
	],
	'host'=>'0.0.0.0',
	'port'=>'9502',
	'worker'=>1
];