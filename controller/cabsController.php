<?php

require_once 'model/cabs.php';
require_once 'util/encryption.php';

class cabsController{
	
	function __construct(){
		$this->cabs= new Cabs();
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
		$id= $this->cabs->create($req);
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
		
		$arr= array();
		
			$res= $this->cabs->view($req);
			$arr['auth']= true;
			$arr['data']= $res;
		
		return $arr;	
	}
	function update($req){
		$id= $this->check($req['token']);
		$arr= array();	
		if($id>0){
			$flag= $this->cabs->update($req);
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
			
			$flag= $this->cabs->delete($req);
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