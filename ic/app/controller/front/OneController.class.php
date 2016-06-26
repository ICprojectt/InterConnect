<?php 
class OneController{
	public function oneAction(){
		require './app/view/front/one.html';
	}
	public function loginAction(){
		require './app/view/front/login.html';
	}
	public function signinAction(){
		//一个表一个模型
		//require './app/model/AdminModel.class.php';
		$model_admin=new AdminModel;
		if($model_admin->checkByLogin($_POST['username'],$_POST['password'])){
			echo "合法用户";
		}else{
			echo "非法用户";
		}

	}
}