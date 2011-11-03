<?php


class Cli {
	protected static $_prefix = " : ";
	
	public static function write($output = '')
	{
		if(is_array($output))
		{
			$output = implode("\n", $output);
		}
		
		fwrite(STDOUT, $output."\n");
	}
	
	public static function read()
	{
		$output = '';
		$options = array();
		
		// Returns an array with params passed to function
        $args = func_get_args();
		
		// check how many params are set to function
		if(count($args) == 2)
		{
			list($output, $options) = $args;
		}
		elseif (count($args) == 1 AND is_string($args[0]))
		{
			$output = $args[0];
		}
		elseif (count($args) == 1 AND is_array($args[0]))
		{
			$options = $args[0];
		}
		
		// write on cli
		if(!empty($output))
		{
			$this->write($output." [".implode(', ', $options)."]");
		}
		
		$input = static::input();
		
		// check if the response is right within the options
		if(!empty($output) AND !in_array($input, $options))
		{
			$this->write('This is not a valid option. Please try again.');
			
			$this->read($output, $options);
		}
		
		return $input;
	}
	
	public static function new_line($num = 1)
	{
		// Do it once or more, write with empty string gives us a new line
        for($i = 0; $i < $num; $i++)
		{
			static::write();
		}
	}
	
	public static function input($prefix = "")
	{
		echo $prefix? : static::$_prefix;
		
		return trim(fgets(STDIN));
	}
	
	/**
	 * Beeps a certain number of times.
	 *
	 * @param	int $num	the number of times to beep
	 */
	public static function beep($num = 1)
	{
		echo str_repeat("\x07", $num);
	}
}
