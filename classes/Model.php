<?php

abstract class Model {
	protected $dbh;
	protected $stmt;

	public function __construct() {
		try {
			$this->dbh = new PDO("mysql:host".DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);	
		} catch (PDOException $e) {
			echo '<h1>Exception</h1><pre>Message:', $e->getMessage(), '</pre>';
		}
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		$this->stmt = $this->dbh->prepare('USE '.DB_NAME);
		$this->stmt->execute();
	}

	public function query($query) {
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
		$this->stmt->execute();
	}

	public function resultSet() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}