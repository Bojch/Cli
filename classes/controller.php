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
		
		$class = array_shift($params);
		$fnc = array_shift($params);
		$param = $params;
		
		if(class_exists($class) AND method_exists($class,$fnc))
		{
			return $class::index($fnc, $param);
		}
		else if(class_exists($class))
		{
			return $class::help();
		}
		else
		{
			$code = '$str = '.$class.';';
			
			eval($code);
			
			return $str;
			/*
			$str = "";
			
			ob_start();
			
			$code = '$str = '.$class.';';
			$code .= 'return TRUE;';
			
			if(FALSE === eval($code))
			{
				Cli::write("JEah!!");	
			}
			$err = ob_get_contents();
			
			ob_end_clean();
			
			return $err;
			 */
		}
		
		return NULL;
	}
}
