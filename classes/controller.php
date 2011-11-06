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
		
		//if(property_exists('hash', 'sha1'))
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
		}
		
		return NULL;
	}
}


function handleError($n, $m, $f, $l) {
    //no difference between excpetions and E_WARNING
    echo "user error handler: e_warning=".E_WARNING."  num=".$n." msg=".$m." line=".$l."\n";
    return true;
    //change to return false to make the "catch" block execute;
}
//set_error_handler('handleError');
/*
try
			{
				eval('$str='.$class.';');
			}
			catch (Exception $e)
			{
    			echo "caught: ".$e->getMessage();
			}
			*/