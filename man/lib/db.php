<?php 
class DP{
	/*
	Name: connect_DB
	Version:1.0 - 16/2/2018
	Objective: connect the DB with PDO
	*/
	private static function connect_DB()
	{
		$host='localhost';
		$dbname='man_db';
		$us='man';
		$pass='man@123';
		// $dbname='mbvakd_sangnhuong';
		// $us='mbvakd_mysql';
		// $pass='admin@2019';
		//PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$us, $pass,array(
		 			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		 			PDO::ATTR_PERSISTENT => false,
		 			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		 		)
		 	);
		 	
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
			return null;
    	}
	}
	/*
	Name:get_type
	Version:1.0 - 20/2/2018
	Objective: get type of PDO paras
	Parameters:
	$var: value of para
	Ouput: type of PDO para
	*/
	private static function get_type($var)
	{
		switch(gettype($var))
		{
			case 'integer': return PDO::PARAM_INT;
			case 'boolean': return PDO::PARAM_BOOL;
			case 'NULL': return PDO::PARAM_NULL;
			default: return PDO::PARAM_STR;
		}
	}
	public static function run_query_internal($q,$paras,$t,$con){
		try{
			$h=$con->prepare($q);
			foreach($paras as $key=>$para)
			{
				$h->bindValue($key+1,$para,DP::get_type($para));
			}
			$h->execute();
			$r;
			switch($t)
			{
				case 1: $r=true;break;
				case 2: $r=$h->fetchAll();break;
				case 3: $r=$con->lastInsertId();break;
			}
			$con=NULL;
			return $r;
		}
		catch(PDOException $e)
		{
			//echo '<span style="display:block;">'.$e->getMessage().'</span>';
			echo '<h1>'.$e->getMessage().'</h1>';
			return false;
		}
	}
	/*
	Name: runQuery
	Version:1.0 - 16/2/2018
	Objective: Run any query and return
	Parameters:
	$q: querystring
	$paras: list of parameters
	$t: type of query (3 types)
	    ----1---insert without incremental ID, update, delete
	    ----2---result list (select query)
	    ----3---last ID (insert with incremental ID)
	Output:
		true: successful
		false: failed
	*/
	public static function run_query($q,$paras,$t){
		$con=DP::connect_DB();
		if($con == false)
		{
			return false;
		}
		return DP::run_query_internal($q,$paras,$t,$con);
	}

	public static function run_transaction($arr){
		$con=DP::connect_DB();
		if($con == false)
		{
			return false;
		}
		$con->beginTransaction();
		foreach($arr as $query){
			$tmp = DP::run_query_internal($query[0],$query[1],$query[2],$con);
			if (!$tmp){
				$con->rollBack();
				return false;
			}
		}
		$con->commit();
		return true;
	}
}
?>
