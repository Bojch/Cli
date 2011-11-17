<?php

class Parameters
{
	public static function extract(&$opt, &$param)
	{
		if( ! (is_array($opt) AND is_array($param)))
		{
			return FALSE;
		}
		
		$p = array();
		
		foreach ($param as $v)
		{
			preg_match('/^-[a-z_-]*/', $v, $matches);
			
			if(empty($matches))
			{
				$p[] = $v;
			}
			else
			{
				if(array_key_exists($v, $opt))
				{
					$opt[$v] = TRUE;
				}
			}
		}
		
		$param = $p;
	} 
}