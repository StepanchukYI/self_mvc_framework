<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 22.05.2018
 * Time: 21:09
 */
require_once "Mail.php";

class Mail
{

	protected $mail;
	protected $host;
	protected $from;
	protected $username;
	protected $password;

	public function __construct()
	{
		$this->host     = Config::get( 'mail.host' );
		$this->username = Config::get( 'mail.user' );
		$this->password = Config::get( 'mail.password' );
		$this->from     = Config::get( 'mail.from' );
	}

	public function sendMail( $to, $subject, $body )
	{
		// ERROR MESSAGES
		$send = mail( $to, $subject, $body, 'From: ' . $this->from );
		if ( $send )
		{
			header( "Location: http://mysite.com/send.php" );
		} else
		{
			print "MISSING EMAIL ADDRESS ALL FILDS MUST BE FILLED!";
		}
	}

	public function sendAuthMail( $to )
	{
		$string = rand( 100000, 999999 );

		return $string;

		// ERROR MESSAGES
//		$send = mail( $to, 'Auth', $string, 'From: ' . $this->from );
		if ( $send )
		{
		} else
		{
			print "MISSING EMAIL ADDRESS ALL FILDS MUST BE FILLED!";
		}
	}


}