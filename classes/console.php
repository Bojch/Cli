<?php

class Console
{
	public function __construct()
	{
		self::main();
	}
	
	private function main()
	{
		Cli::write(sprintf(
			'Utils %s - PHP %s [%s]'."\n",
			"0.5",
			phpversion(),
			PHP_OS
		));
		
		do
		{
			$line = trim(Cli::input(), PHP_EOL);
			
			// finish
			if($line == "quit" OR $line == "q")
			{
				Cli::write('Goodbye');
				break;
			}
			
			if($out = Controller::con($line))
			{
				Cli::write($out);
				Cli::new_line();
			}
			
		}
		while(TRUE);
	}
}
