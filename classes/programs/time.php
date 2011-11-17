<?php

class Time implements Programs
{
	public static function index($fnc, $param)
	{
		return "index";
	}
	
	public static function timestamp()
	{
		return time();
	}
	
	public static function today()
	{
		return date("Y-m-d H:i:s");
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  time [timestamp|today] [options]
  
HELP;

		Cli::write($output);
	}
}

