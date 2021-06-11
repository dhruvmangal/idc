<?php

require_once 'model/admin.php';
require_once 'util/encryption.php';

class AdminController{
	
	function __construct(){
		$this->admin= new Admin();
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
		$arr= array();
		$id= $this->admin->create($req);
		if($id>0){
			$crypt= new Crypto();
			$token= $crypt->__encrypt($id); 
			
			$arr['auth']= true;
			$arr['flag']= true;
		}else{
			$arr['auth']= false;
			$arr['false']= false;
		}
		
		
		return $arr;
	}
	function view($req){
		$id= $this->check($req['token']);
		$arr= array();
		if($id>0){
			$res= $this->admin->view($req);
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
			$flag= $this->admin->update($req);
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
			
			$flag= $this->admin->delete($req);
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
	
	function login($req){
		$id= $this->admin->login($req);
		$arr= array();
		if($id>0){
			$arr['token']= $this->crypto->__encrypt($id);
			$arr['auth']= true;
		}else{
			$arr['auth']= false;
		}
		return $arr;	
	}
}

?>