<?php
class DB{
	private static $_instance=null;
	private $_pdo;
	private	$_query;
	private $_error=false;
	private $_results;
	private $_count =0;
	//create construct of the class 
	//which setup the connection of database 
	private function __construct(){
		try {
			$this->_pdo=new PDO('mysql:host=' . config::get('mysql/host') . ';dbname=' . config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password'));
		}
		catch(PDOException $e){
			die($e->getMessage());
		}

	}
	//create database connection 
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}
		// prepare el query w execute it .
	public function query($sql, $params= array()){
		$this->_error=false;
		if($this->_query = $this->_pdo->prepare($sql)){
			$x=1;
			if(count($params)){
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
			if(!$params){
				$this->_query=$sql;
			}


			if($this->_query->execute()){
				$this->_results= $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count= $this->_query->rowCount();
			} else{
				$this->_error=true;
			}
		}
		return $this;
	}
		// bt7dd el action el fi el query 
		//insert aw update aw delete 
	public function action($action, $table, $where=array()){
		if(count($where)===3 && $where[0] != '0'){
			$operators= array('=','<','>','>=','<=');

			$field= $where[0];
			$operator= $where[1];
			$value= $where[2];

			if(in_array($operator, $operators)){
				$sql="{$action} FROM {$table}  WHERE {$field} {$operator} ?";
				if(!$this->query($sql, array($value))->error()){
					return $this;
				}
			}
		}else{
			$value=array(0);
			$sql="{$action} FROM {$table}";
				if(!$this->query($sql,$value)->error()){
					return $this;
				}
		}

		return false;

	}
	

		//select function 
	public function get($table, $where){
		return $this->action('SELECT *', $table, $where);
	}

	public function delete($table, $where){
		return $this->action('DELETE', $table, $where);

	}
	//insert function  
	public function insert($table, $fields=array()){
		if(count($fields)){
			$keys=array_keys($fields);
			$values='';
			$x = 1;

			foreach($fields as $field){
				$values .= '?';
				if($x < count($fields)){
					$values .= ', ';
				}
				$x++;
			}
			$sql= "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			
			if(!$this->query($sql, $fields)->error()){
				return true;

			}
		}
			return false;
	}
		//update function  
	public function update($table, $id, $fields){
		$set ='';
		$x=1;

		foreach($fields as $name => $value){
			$set .= "{$name} = ?";
			if($x < count($fields)){
				$set .= ', ';
			}
			$x++;
		}

		$sql="UPDATE {$table} SET {$set} WHERE id = {$id}";

		if(!$this->query($sql, $fields)->error()){
			return true;
		}
		return false;
	}
	//function al bt3mel return l results eli 3ndna mn db
	public function results(){
		return $this->_results;
	}
	//return first result mn results
	//like results()->first();= results()[0];
	public function first(){
		return $this->results();
	}
		//return el error el 7asl in process 
	public function error(){

		return $this->_error;
	}
	// conunt () !! 
	public function count(){
		return $this->_count;
	}
}