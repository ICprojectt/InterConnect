<?php
/**
 * 模型的基础类
 */
class Model {
	protected $db;//保存MySQLDB类的对象
	/**
	 * 构造方法
	 */
	public function __construct() {
		//连接数据库
		$this->initLink();
	}
	/**
	 * 初始化数据库的连接
	 */
	protected function initLink() {
//		require './framework/MySQLDB.class.php';
		$options = array(
			'host'=>'115.28.73.231',
			'port'=>'3306',
			'user'=>'root',
			'pass'=>'1f3x2r',
			'charset'=>'utf8',
			'dbname'=>'InterConnect'
		);
		$this->db = MySQLDB::getInstance($options);
	}
}