<?php

require_once 'model/user.php';
require_once 'util/encryption.php';

class userController{
	
	function __construct(){
		$this->user= new User();
		$this->crypto= new Crypto();
	}
	protected function check($token){
		$id= $this->crypto->__decrypt($token);
		if($id > 0){
			return $id;
		}else{
			return 0;
		}
	}
	function create($req){
		$id= $this->check($req['token']);
		$arr= array();
		$id= $this->user->create($req);
		if($id>0){
			
			
			$arr['auth']= true;
			$arr['flag']= true;
		}else{
			$arr['auth']= false;
			$arr['flag']= false;
		}
		
		
		return $arr;
	}
	function view($req){
		$id= $this->check($req['token']);
		$arr= array();
		if($id>0){
			$res= $this->user->view($req);
			$arr['auth']= true;
			$arr['data']= $res;
		}else{
			$arr['auth']= false;
			
		}
		return $arr;	
	}
	function update($req){
		$id= $this->check($req['token']);
		$arr= array();	
		if($id>0){
			$flag= $this->user->update($req);
			$arr= array();
			$arr['auth']= true;
			$arr['data']= $flag;
		}
		else{
			$arr['auth']= true;
			$arr['data']= false;
		}
		return $arr;
	}
	function delete($req){
		$id= $this->check($req['token']);
		$arr= array();	
		if($id>0){
			
			$flag= $this->user->delete($req);
			$arr= array();
			$arr['auth']= true;
			$arr['data']= $flag;
		}
		else{
			$arr['auth']= true;
			$arr['data']= false;
		}
		return $arr;
	}
	
	
}

?>