<?php

class Time implements Programs
{
	public static function index($arg = "")
	{
		return "to je index";
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
/*
Runtime options:
  -f, [--force]    # Overwrite files that already exist
  -s, [--skip]     # Skip files that already exist

Description:
  The 'oil' command can be used to generate MVC components, database migrations
  and run specific tasks.

Examples:
  php oil generate controller <controllername> [<action1> |<action2> |..]
  php oil g model <modelname> [<fieldname1>:<type1> |<fieldname2>:<type2> |..]
  php oil g migration <migrationname> [<fieldname1>:<type1> |<fieldname2>:<type2> |..]
  php oil g scaffold <modelname> [<fieldname1>:<type1> |<fieldname2>:<type2> |..]
  php oil g scaffold/template_subfolder <modelname> [<fieldname1>:<type1> |<fieldname2>:<type2> |..]

Note that the next two lines are equivalent:
  php oil g scaffold <modelname> ...
  php oil g scaffold/default <modelname> ...

Documentation:
  http://fuelphp.com/docs/packages/oil/generate.html
HELP;*/

		Cli::write($output);
	}
}

