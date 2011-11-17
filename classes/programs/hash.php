<?php

class Hash implements Programs
{
	static protected $_options = array(
		'-r' => TRUE,
		'--raw-output' => TRUE
	);
	
	public static function index($fnc, $param)
	{
		return "index";
	}
	
	public static function md5(Array $param)
	{
		$opt = array_shift($param);
		$str = array_shift($param);

		Parameters::extract($str, $opt);
		
		return md5($str, $opt);
	}
	
	public static function sha1(Array $param)
	{
		$opt = array_shift($param);
		$str = array_shift($param);

		Parameters::extract($str, $opt);
		
		return sha1($str, $opt);
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  hash [md5|sha1] [options] [string]

Runtime options:
  -r, [--raw-output]			# raw_output - Returned raw binary format with a length of 16

Examples:
  hash sha1 <options> <string>
  hash md5 <options> <string>
  
HELP;

		return $output;
	}
}

