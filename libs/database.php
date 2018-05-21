<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 23:49
 */

class Database
{
	protected $connection;

	public function __construct($host, $user, $password, $db_name)
	{
		$dsn = 'mysql:dbname='.$db_name.';host='.$host;

		try {
			return $this->connection =  new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			return 'Connection failed: ' . $e->getMessage();
		}
	}

	public function query($sql){
		if( !$this->connection){
			return false;
		}

		$result = $this->connection->prepare($sql);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}