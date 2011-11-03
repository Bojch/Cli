<?php

class Controller
{
	protected $_class = '';
	protected $_function = '';
	protected $_parameters = '';
	
	public static function con($params)
	{
		if(! is_array($params) OR empty($params))
		{
			return NULL;
		}
		
		$class = array_shift($params);// (isset($params[0]))? $params[0] : "";
		$fnc = array_shift($params); //(isset($params[1]))? $params[1] : "help";
		$param = $params; //(isset($params[3]))? $params[3] : "";
		
		if(class_exists($class) AND method_exists($class,$fnc))
		{
			return $class::$fnc($param);
		}
		else if(class_exists($class))
		{
			return $class::help();
		}
		else
		{
			$str = "";
			eval('$str='.$class.';');

			return $str;
		}
		
		return NULL;
	}
}
