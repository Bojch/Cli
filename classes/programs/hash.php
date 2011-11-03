<?php

class Hash implements Programs
{
	static protected $_options = array(
		'-r' => TRUE,
		'--raw_output' => TRUE
	);
	
	public static function md5(Array $param)
	{
		$opt = array_shift($param);
		$str = array_shift($param);

		static::parameters($str, $opt);
		
		return md5($str, $opt);
	}
	
	public static function sha1(Array $param)
	{
		$opt = array_shift($param);
		$str = array_shift($param);

		static::parameters($str, $opt);
		
		return sha1($str, $opt);
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  hash [md5|sha1] [options] [string]

Runtime options (md5):
  -r, [--raw_output]	# Returned raw binary format with a length of 16

Runtime options (sha1):
  -r, [--raw_output]	# returned raw binary format with a length of 20, otherwise 40-character in hexadecimal number

Examples:
  hash sha1 <options> <string>
  hash md5 <options> <string>
  
HELP;

		Cli::write($output);
	}
	
	private static function parameters(&$str, &$opt)
	{
		// check if options are passed
		preg_match('/-[a-z_-]*/', $opt, $matches);
		
		if(empty($matches))
		{
			$str = $opt;
			$opt = FALSE;
		}
		else
		{
			if(array_key_exists($opt, static::$_options))
			{
				$opt = static::$_options[$opt];
			}
			else
			{
				$opt = FALSE;
			}
		}
	}
}

