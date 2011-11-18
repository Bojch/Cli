<?php

class Controller
{
	protected $_class = '';
	protected $_function = '';
	protected $_parameters = '';
	
	public static function con($line)
	{
		if(empty($line))
		{
			return NULL;
		}
		
		$params = explode(" ", $line);
		
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
			//return FALSE;
			
			$str = "";
			
			ob_start();
			
			$ret = eval("$line;");
			
			//echo $ret;
			// Error was returned
			if ($ret === false)
			{
				Cli::write('Parse Error - ' . $line);
				Cli::beep();
			}
			
			$out = ob_get_contents();
			
			ob_end_clean();
			
			//echo $ret;
		}
		
		return NULL;
	}
}
