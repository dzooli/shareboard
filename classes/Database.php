<?php

class Database {
	private $host 	= 'localhost';
	private $user 	= 'root';
	private $pass 	= 'xxxxxx';
	private $dbname = 'myblog';

	private $dbh;
	private $error;
	private $stmt;

	/**
	* Initialize the DB connection with the given internal parameters.
	*
	* @see Database::login()
	* @throws None
	*/
	public function __construct() {
		// Set the DSN
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
		// Set options
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
		);
		// Try to connect to the database
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch (PDOException $ex) {
			$this->error = $ex->getMessage();
		}
	}

	public function __destruct() {
		if ($dbh) {
			return true;
			//$dbh = null;
		}
	}

	/**
	* Prepare the query
	*/
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	/**
	* Bind the values into the query
	* @param $param string tha name of the parameter
	* @param $value string the value of the parameter
	* @param $type  null by default. Type is determined by the type of the $value
	*/
	public function bind($param, $value, $type = null) {
		if (is_null($type)) {
			switch(true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute() {
		return $this->stmt->execute();
	}

	public function lastInsertId() {
		return $this->dbh->lastInsertId();
	}

	/**
	* Get the resultset of the executed query
	* @return An associative array of the resulted data. key is the column name, value is the value of the record.
	*/
	public function resultset()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}