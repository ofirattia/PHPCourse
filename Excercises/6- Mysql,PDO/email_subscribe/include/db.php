<?php

class Database{
    private $host;
    private $user;
    private $pass;
    private $dbname;
 
    private $dbh;
    private $error;
	private $stmt;
	
    public function __construct($config){
		require_once  $config;
		$this->host      = DB_HOST;
		$this->user      = DB_USER;
		$this->pass      = DB_PASS;
		$this->dbname    = DB_NAME;
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		);
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	/**
	*	Param is the placeholder value that we will be using in our SQL statement, example :name.
	*	Value is the actual value that we want to bind to the placeholder, example 
	*/
	public function bind($param, $value, $type = null){
		if (is_null($type)) {
			switch (true) {
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
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	public function execute(){
		return $this->stmt->execute();
	}
	/**
	* The Result Set function returns an array of the result set rows
	*/
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	/**
	* returns a single record from the database.
	*/
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
	public function beginTransaction(){
		return $this->dbh->beginTransaction();
	}
	public function endTransaction(){
		return $this->dbh->commit();
	}
	public function cancelTransaction(){
		return $this->dbh->rollBack();
	}
	public function debugDumpParams(){
		return $this->stmt->debugDumpParams();
	}
	/*
	* use: $db->import_csv("subscribers",(["id","email"]),"subscribers.csv");
	* @param: $table -> the name of the table
	* @param: $parameters -> array of the columns in the table that corresponds to the number of cols in the csv file
	* @param: $csv_file -> string , for example data.csv 
	* Note: the files found in the folder of the Database class under directory named "data"
	*/
	public function import_csv($table,$parameters,$csv_file){
		$csvFile = __DIR__ . '/data/'.$csv_file;
		foreach ($parameters as $i => $value) {
				$questionMarks[$i]="?";
		}
		$fp = fopen($csvFile, 'r');
		$sql = "INSERT INTO ".$table." (".implode(',',$parameters).") VALUES (".implode(',',$questionMarks).")";
		$this->query($sql);
		while ($row = fgetcsv($fp)) {
			$this->stmt->execute($row);
		}
		fclose($fp);
	}
	/**
	* @param: table -> get the name of the table
	* @param: sort -> sort by the column name , if its null it will export to the csv file without any sorting
	*/
	public function export_table_file($table,$extension,$sort=null){
		if($sort==null)
			$this->query("SELECT * FROM ".$table);
		else
			$this->query("SELECT * FROM ".$table." ORDER BY `".$sort."`");
		$this->arrayToFile($table.date("Y-m-d"),$this->resultset(),$extension);
	}
	private function arrayToFile($file_name,$list,$extension){
		$fp = fopen($file_name.".".$extension, 'w');
		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}
		fclose($fp);
	}
	
}


?>