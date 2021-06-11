<?php

require_once 'dbconnect.php';

class Tour extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO tour( tour_city_from, tour_city_to, category, tour_image, package, status, tour_time, tour_date)
		VALUES('".$data['from']."', '".$data['to']."', '".$data['category']."', '".$data['image']."','".$data['package']."', '1', '".$this->_time."', '".$this->_date."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM cabs";
		$r=0;
		if(isset($data['search'])){
			$sql= $sql." WHERE ";
			if(isset($data['name'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." cab_name LIKE '%".$data['name']."%'";
				$r++;
			}
			if(isset($data['capacity'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." capacity = '".$data['capacity']."'";
				$r++;
			}
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." cab_id = '".$data['id']."'";
				$r++;
			}
			if(isset($data['status'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." cab_status = '".$data['status']."'";
				$r++;
			}
		}
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['cab_id'];
			$arr[$i]['name']= $row['cab_name'];
			$arr[$i]['image']= $row['cab_image'];
			
			$arr[$i]['capacity']= $row['capacity'];	
			$arr[$i]['desc']= $row['cab_description'];
			$arr[$i]['status']= $row['cab_status'];
			$i++;
		}
		return $arr;
		
	}
	function update($data){
		$sql= "UPDATE cabs SET ";
		$r=0;
		if(isset($data['name'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." cab_name= '".$data['name']."'";
			$r++;
		}
		if(isset($data['image'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." cab_image= '".$data['image']."'";
			$r++;
		}
		if(isset($data['capacity'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." capacity= '".$data['capacity']."'";
			$r++;
		}
		if(isset($data['desc'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." cab_description= '".$data['desc']."'";
			$r++;
		}
		if(isset($data['status'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." cab_status= '".$data['status']."'";
			$r++;
		}
		$sql= $sql." WHERE cab_id='".$data['id']."'";
		//echo $sql;
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM cabs WHERE cab_id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}
?>