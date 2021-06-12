<?php

require_once 'dbconnect.php';

class OnewayNote extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO oneway_note( oneway_id, note, status)
		VALUES('".$data['oneway_id']."', '".$data['note']."', '1')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM oneway_note";
		$r=0;
		if(isset($data['search'])){
			$sql= $sql." WHERE ";
			if(isset($data['oneway_id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." oneway_id = '".$data['oneway_id']."'";
				$r++;
			}
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." id = '".$data['id']."'";
				$r++;
			}
			if(isset($data['status'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." status = '".$data['status']."'";
				$r++;
			}
		}
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['id'];
			$arr[$i]['oneway_id']= $row['oneway_id'];
			$arr[$i]['note']= $row['note'];
			
			$arr[$i]['status']= $row['status'];	
			$i++;
		}
		return $arr;
		
	}
	function update($data){
		$sql= "UPDATE oneway_note SET ";
		$r=0;
		if(isset($data['note'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." note= '".$data['note']."'";
			$r++;
		}
		if(isset($data['status'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." status= '".$data['status']."'";
			$r++;
		}
		
		$sql= $sql." WHERE id='".$data['id']."'";
		//echo $sql;
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function delete($data){
		$sql= "DELETE FROM oneway_note WHERE id='".$data['id ']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}
?>