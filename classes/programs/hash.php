<?php

class Hash implements Programs
{
	public static function md5($param ="")
	{
		$str = empty($param)? "123456" : $param;

		return md5($str);
	}
	
	public static function sha1($param ="")
	{
		$str = empty($param)? "123456" : $param;
		
		return sha1($str);
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  hash [md5|sha1] [options]
  
HELP;

		Cli::write($output);
	}
}

