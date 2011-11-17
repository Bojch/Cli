<?php

class Db implements Programs
{
	public static function index($fnc, $param)
	{
		return "index";
	}
	
	public static function connect(Array $param)
	{
		$err = FALSE;

		$hostname = array_shift($param);
		$username = array_shift($param);
		$password = array_shift($param);
		$database = array_shift($param);

		$db = @mysql_connect($hostname, $username, $password);
		
		if ( ! is_resource($db))
		{
			$err = TRUE;
		}
		else
		{
			mysql_close($db);	
		}

		if($err)
		{
			return ('Could not connect: ' . mysql_error());
		}

		return 'Connected successfully';
	}
	
	public static function help()
	{
		$output = <<<HELP
Usage:
  db [connect] <host:port, user, pass, db>

Examples:
  db connect localhost:3306 root
  
HELP;

		return $output;
	}
}

