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
		
		$class = "";
		$fnc = "help";
		$param = "";
		
		if(isset($params[0]))
		{
			$class = $params[0];
			
			if(isset($params[1]))
			{
				$fnc = $params[1];
				
				if(isset($params[2]))
				{
					$param = trim($params[2]);
				}
			}
		}
		
		if(class_exists($class))
		{
			return $class::$fnc($param);
		}
		
		return NULL;
	}
}
