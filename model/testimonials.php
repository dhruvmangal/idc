<?php

require_once 'dbconnect.php';

class Testimonials extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO testimonial(tsm_name, tsm_image, tsm_desc, tsm_status, tsm_time, tsm_date)
		VALUES('".$data['name']."', '".$data['image']."', '".$data['desc']."', '1', '".$this->_time."', '".$this->_date."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM testimonial";
		if(isset($data['search'])){
			$r=0;
			$sql= $sql." WHERE ";
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." tsm_id= '".$data['id']."'";
				$r++;
			}
			if(isset($data['name'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." tsm_name= '".$data['name']."'";
				$r++;
			}
			if(isset($data['image'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." tsm_image= '".$data['image']."'";
				$r++;
			}
			if(isset($data['desc'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." tsm_desc= '".$data['desc']."'";
				$r++;
			}
			if(isset($data['status'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." tsm_status= '".$data['status']."'";
				$r++;
			}
			
		}
		
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['tsm_id'];
			$arr[$i]['name']= $row['tsm_name'];
			$arr[$i]['image']= $row['tsm_image'];
			$arr[$i]['desc']= $row['tsm_desc'];
			$arr[$i]['status']= $row['tsm_status'];
			$i++;
		}
		return $arr;
	}
	function update($data){
		$sql= "UPDATE testimonial SET";
		$r=0;
		if(isset($data['name'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." tsm_name= '".$data['name']."'";
			$r++;
		}
		if(isset($data['image'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." tsm_image= '".$data['image']."'";
			$r++;
		}
		if(isset($data['status'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." tsm_status= '".$data['status']."'";
			$r++;
		}
		
		$sql= $sql." WHERE tsm_id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM testimonial WHERE tsm_id= '".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}

?>