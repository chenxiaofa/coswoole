<?php
/**
 * User: 陈晓发
 * Date: 2016/7/20
 * Time: 14:09
 */

namespace coswoole\base;


class ConfigurableObject
{
	public function __construct($config)
	{
		foreach($config as $property => $value)
		{	if ($property == 'class') continue;
			if ( ! property_exists($this,$property) )
			{
				throw new \Exception('Invalid property:'.$property);
			}
			if (is_array($value) && array_key_exists('class',$value))
			{
				$this->$property = new $value['class']($value);
			}
			else
			{
				$this->$property = $value;
			}
		}
		$this->init();
	}

	public function init()
	{

	}

	/**
	 * Returns the fully qualified name of this class.
	 * @return string the fully qualified name of this class.
	 */
	public static function className()
	{
		return get_called_class();
	}

}