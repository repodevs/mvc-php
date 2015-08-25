<?php 
namespace vendor;

/**
* Config all
*/
class Config
{
	
	public static $directory;
	public static $config = [];

	/**
	 * 
	 * Setting the directory of all class
	 * @param [object] 
	 * 
	 */
	public static function setDirectory($path)
	{
		self::$directory = $path;
	}

	public static function get($config)
	{
		$config = strtolower($config);

		self::$config[$config] = require self::$directory . '/' . $config . '.php';

		return self::$config[$config];
	}

}

?>