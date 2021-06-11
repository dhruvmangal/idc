<?php

require_once 'dbconnect.php';

class Admin extends Database{
	public function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	
	function create($arr){
		$sql= "INSERT INTO admin (admin_name, admin_phone, admin_password, admin_time, admin_date)
		VALUES('".$arr['name']."', '".$arr['phone']."', '".$arr['password']."', '".$this->_time."', '".$this->_date."')";
		
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM admin";
		if(isset($data['search'])){
			$r=0;
			$sql= $sql." WHERE ";
			if(isset($data['name'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." admin_name = '".$data['name']."'";
				$r++;
			}
			if(isset($data['phone'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." admin_phone = '".$data['phone']."'";
				$r++;
			}
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." admin_id = '".$data['id']."'";
				$r++;
			}
		}
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		//echo $sql;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['admin_id'];
			$arr[$i]['name']= $row['admin_name'];
			$arr[$i]['phone']= $row['admin_phone'];
			$i++;
		}
		return $arr;
	}
	function update($data){
		$sql ="UPDATE admin SET ";
		$r=0;
		if(isset($data['name'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." admin_name LIKE '%".$data['city']."%'";
			$r++;
		}
		if(isset($data['phone'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql."admin_phone = '".$data['phone']."'";
			$r++;
		}
		
		$sql= $sql." WHERE admin_id='".$data['id']."'";
		//echo $sql;
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM admin WHERE admin_id= '".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function login($data){
		$sql= " SELECT admin_id FROM admin WHERE admin_phone= '".$data['phone']."' AND admin_password= '".$data['password']."'";
		//echo $sql;
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr['id']= $row['admin_id'];
			
			$i++;
		}
		return $arr['id'];
	
	}
}
?>