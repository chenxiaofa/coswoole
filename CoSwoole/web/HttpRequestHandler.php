<?php
/**
 * User: 陈晓发
 * Date: 2016/7/21
 * Time: 9:52
 */

namespace coswoole\web;


use coswoole\base\ConfigurableObject;

class HttpRequestHandler extends ConfigurableObject
{
	protected $request = null;
	protected $response = null;
	public function requestInit($request,$response)
	{
		$this->request = $request;
		$this->response = $response;
		$this->beforeRun();
	}
	public function beforeRun()
	{

	}
	public function run()
	{

	}
	public function afterRun()
	{
		$this->response = null;
		$this->request = null;
	}
}