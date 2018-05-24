<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 22.05.2018
 * Time: 19:36
 */

class Model
{

	protected $database;
	protected $table;

	protected $query;

	public function __construct()
	{
		$this->database = App::$db;

	}

	public function all()
	{
		$sql = "SELECT * FROM " . $this->getTable();

		return $this->database->query( $sql );
	}

	public function query( $query )
	{
		$this->query = "SELECT * FROM " . $this->getTable();

		$this->query .= ' ' . $query;

		$sql         = $this->query;
		$this->query = null;

		return $this->database->query( $sql );
	}

	public function find( $id )
	{
		$sql = "SELECT * FROM " . $this->getTable();

		$sql .= ' WHERE id = ' . $id;

		return $this->database->query( $sql )[0];
	}

	/**
	 * @return mixed
	 */
	public function get()
	{
		return $this->database->query( $this->query );
	}

	public function select()
	{
		return $this->query = "SELECT * FROM " . $this->getTable();
	}

	public function where( $key, $arg, $value )
	{
		return $this->query .= " WHERE " . $key . " " . $arg . " " . $value;
	}

	/**
	 * @return mixed
	 */
	public function getTable()
	{
		return $this->table;
	}

	public function insert( $data = array() )
	{
		$sql = "INSERT INTO " . $this->getTable();

		//INSERT INTO table_name (column1, column2, column3, ...)
		//VALUES (value1, value2, value3, ...);
		$keys     = " (";
		$values   = "VALUES (";
		$last_key = end( array_keys( $data ) );
		foreach ( $data as $key => $value )
		{
			$keys   .= $key;
			$values .= "'".$value."'";

			if ( $key != $last_key )
			{
				$keys   .= ', ';
				$values .= ', ';
			}
		}
		$keys   .= ') ';
		$values .= ')';

		$sql .= $keys . $values;
//		var_dump($sql);die();
		return $this->database->query( $sql );
	}

	public function update($data = array(), $id){

		$sql = "UPDATE " . $this->getTable();

		//SET column1 = value1, column2 = value2, ...
		$values   = " SET ";
		$last_key = end( array_keys( $data ) );
		foreach ( $data as $key => $value )
		{
			$values .= $key . " = '" . $value. "' ";

			if ( $key != $last_key )
			{
				$values .= ', ';
			}
		}
		$sql .= $values;

		//WHERE condition;
		$sql .= " WHERE id = ". $id;
//		var_dump($sql);die();
		return $this->database->query( $sql );
	}

//UPDATE table_name

}