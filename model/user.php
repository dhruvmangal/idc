<?php

require_once 'dbconnect.php';

class User extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}	
	
	function create($data){
		$sql= "INSERT INTO user( user_name, user_phone, user_password, user_status, user_time, user_date) 
		VALUES('".$data['name']."','".$data['phone']."','".$data['password']."', '1', '".$this->_time."','".$this->_date."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM user";
		$r=0;
		if(isset($data['search'])){
			$sql= $sql." WHERE "; 
			if($data['phone']){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." user_phone = '".$data['phone']."'";
				$r++;
			}
			if($data['name']){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." user_name = '".$data['name']."'";
				$r++;
			}
			if($data['status']){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." user_status = '".$data['status']."'";
				$r++;
			}
			
		}
		
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['user_id'];
			$arr[$i]['name']= $row['user_name'];
			$arr[$i]['phone']= $row['user_phone'];
			$arr[$i]['status']= $row['user_status'];
			$i++;
		}
		return $arr;
		
	}
	function update($data){
		$sql= "UPDATE user SET";
		$r=0;
		if(isset($data['name'])){
			if($r>0)
				$sql= $sql." , ";
			
			$sql= $sql." user_name= '".$data['name']."'";
			$r++;
		}
		if(isset($data['phone'])){
			if($r>0)
				$sql= $sql." , ";
			
			$sql= $sql." user_phone= '".$data['phone']."'";
			$r++;
		}
		if(isset($data['password'])){
			if($r>0)
				$sql= $sql." , ";
			
			$sql= $sql." user_password= '".$data['password']."'";
			$r++;
		}
		if(isset($data['status'])){
			if($r>0)
				$sql= $sql." , ";
			
			$sql= $sql." user_status= '".$data['status']."'";
			$r++;
		}
		
		$sql= $sql." WHERE user_id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM user WHERE user_id= '".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}

?>