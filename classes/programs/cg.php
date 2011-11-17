<?php

class Cg implements Programs
{
	private static $_opt = array();
	
	public static function index($fnc, $param)
	{
		Parameters::extract(static::$_opt, $param);

		if(empty($param))
		{
			static::help();
			return;
		}
		
		return static::$fnc($param);
	}
	
	protected static function gen(Array $param)
	{
		$length = (int)array_shift($param);
		
		return substr(md5(crypt(rand(0,10))),0,$length);
	}
	
	protected static function random(Array $param)
	{
		$length = (int)array_shift($param);
		$string = (string)array_shift($param);
		
		$length = ($length - strlen($string) >0)? $length - strlen($string) : 0;
		
	    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
		
	    for ($i = 0; $i < $length; $i++)
	    {
	        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
	    }
		
	    return $string;
	}
	
	protected static function pwd(Array $param)
	{
		$length = (int)array_shift($param);
		$strength = (int)array_shift($param);
		
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '123456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++)
		{
			if ($alt == 1)
			{
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			}
			else
			{
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		
		return $password;
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  cg [gen | random | pwd] <length> <strength>
  
Runtime options:
  -n, [--force]    # Overwrite files that already exist
  -s, [--skip]     # Skip files that already exist
  
Examples:
  cg gen <length>
  cg pwd <length> <strength>
  cg random <length> <string>

Description:
  The 'oil' command can be used to generate MVC components, database migrations
  and run specific tasks.

Documentation:
  http://www...
  
HELP;

		Cli::write($output);
	}
}
