<?php

require_once 'dbconnect.php';

class Slide extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO slide(slide_title, slide, slide_status, slide_time, slide_date)
		VALUES('".$data['title']."', '".$data['slide']."', '1', '".$this->_time."', '".$this->_date."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM slide";
		if(isset($data['search'])){
			$r=0;
			$sql= $sql." WHERE";
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." slide_id= '".$data['id']."'";
				$r++;
			}
			if(isset($data['title'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." slide_title= '".$data['title']."'";
				$r++;
			}
			if(isset($data['status'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." slide_status= '".$data['status']."'";
				$r++;
			}
			
		}
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['slide_id'];
			$arr[$i]['title']= $row['slide_title'];
			$arr[$i]['slide']= $row['slide'];
			$arr[$i]['status']= $row['slide_status'];
			$i++;
		}
		return $arr;
	}
	function update($data){
		$sql= "UPDATE slide SET";
		$r=0;
		if(isset($data['title'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." slide_title= '".$data['title']."'";
			$r++;
		}
		if(isset($data['slide'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." slide= '".$data['slide']."'";
			$r++;
		}
		if(isset($data['status'])){
			if($r>0)
				$sql= $sql." , ";	
			$sql= $sql." slide_status= '".$data['status']."'";
			$r++;
		}
		
		$sql= $sql." WHERE slide_id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM slide WHERE slide_id= '".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}

?>