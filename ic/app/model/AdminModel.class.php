<?php
//require './framework/Model.class.php'
class AdminModel extends Model{
	public function checkByLogin($admin_name,$admin_pass){
		$sql="select * from it_admin where admin_name='$admin_name' and admin_pass=md5('$admin_pass')";
		$row=$this->db->fetchRow($sql);
		return (bool)$row;
	}
	public function check2ByLogin($admin_name,$admin_pass){
		$sql="select * from it_admin where admin_name='$admin_name' and admin_pass=md5('$admin_pass')";
		$row=mysql_query($db,$sql);
		return $row;
	}
}