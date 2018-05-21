<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 20:50
 */

class Config
{
	protected static $settings = array();

	public static function get( $item )
	{
		return isset( self::$settings[ $item ] ) ? self::$settings[ $item ] : null;
	}

	public static function set( $item, $value )
	{
		self::$settings[ $item ] = $value;
	}
}