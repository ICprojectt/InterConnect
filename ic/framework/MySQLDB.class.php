<?php
class MySQLDB{
	private static $instance;
	
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;

	private $last_sql;
	private $link;

	public static function getInstance($options){
		if (! (self::$instance instanceof self)) {
			self::$instance=new slef($options);
		}
		return $instance;
	}	

	private function __construct($options=array()){
		$this->host=isset($options['host'])?$options['host']:'127.0.0.1';
		$this->port=isset($options['port'])?$options['port']:'3306';
		$this->user=isset($options['user'])?$options['user']:'root';
		$this->pass=isset($options['pass'])?$options['pass']:'';
		$this->charset=isset($options['charset'])?$options['charset']:'utf-8';
		$this->dbname=isset($options['dbname'])?$options['dbname']:'dbname';
		$this->connect();
		$this->setCharst();
	}
	private function connect(){
		$this->link=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname) or die('111');

	}
	private function setCharst(){
		$sql="set names $this->charset";
		return $this->query($sql);
	}
	public function query($sql){
		$this->last_sql=$sql;
		if(!($result=mysqli_query($this->link,$query))){
			echo "sql错误";
			echo "出错sql:",$sql;
			echo '错误代码是：', mysql_errno($this->link), '<br>';
			echo '错误信息是：', mysql_error($this->link), '<br>';
			die;
		}else{
			return $result
		}
	}
	public function fetchAll($sql){
		if ($result=$this->query($sql)) {
			$rows=array();
			while ($row=mysqli_fetch_array($result)) {
				$rows[]=$row;
			}
			mysqli_free_result($result);
			return $rows;
		}else{
			return false;
		}
	}
	public function fetchRow($sql){
		if ($result=$this->query($sql)) {
			$row=mysqli_fetch_array($result);
			mysqli_free_result($result);
			return $rows;
		}else{
			return false;
		}
	}
	public function fetchColum($sql){
		if ($result=$this->query($sql)) {
			if($row=mysqli_fetch_row($result)){
				return $row[0];
				mysqli_free_result($result);
			}
			
		}else{
			return false;
		}
	}