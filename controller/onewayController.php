<?php

require_once 'model/oneway.php';
require_once 'util/encryption.php';

class OnewayController{
	
	function __construct(){
		$this->oneway= new Oneway();
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
		$id= $this->oneway->create($req);
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
		
			$res= $this->oneway->view($req);
			$arr['auth']= true;
			$arr['data']= $res;
		
		return $arr;	
	}
	function update($req){
		$id= $this->check($req['token']);
		$arr= array();	
		if($id>0){
			$flag= $this->oneway->update($req);
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
			
			$flag= $this->oneway->delete($req);
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