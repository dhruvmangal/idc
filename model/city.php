<?php
require_once 'dbconnect.php';

class City extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	
	function create($data){
		$sql= "INSERT INTO city (city, city_time, city_date) 
		VALUES('".$data['city']."', '".$this->_time."', '".$this->_date."')";
		//echo $sql;
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM city";
		$r=0;
		if(isset($data['search'])){
			$sql= $sql." WHERE ";
			if(isset($data['city'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." city LIKE '%".$data['city']."%'";
				$r++;
			}
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." city_id = '".$data['id']."'";
				$r++;
			}
		}
		
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['city_id'];
			$arr[$i]['city']= $row['city'];
			$i++;
		}
		return $arr;
	}
	function update($data){
		$sql= "UPDATE city SET ";
		$r=0;
		if(isset($data['city'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql."city= '".$data['city']."'";
			$r++;
		}
		$sql= $sql." WHERE city_id='".$data['id']."'";
		//echo $sql;
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM city WHERE city_id= '".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}

?>