<?php

require_once 'dbconnect.php';

class OnewayCabs extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO oneway_cabs( oneway_id, cab_id, price, status, time, date)
		VALUES('".$data['id']."', '".$data['cab_id']."', '".$data['price']."', '1', '".$this->_time."', '".$this->_date."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM oneway_cabs AS oc INNER JOIN Cabs as c ON oc.cab_id = c.cab_id";
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
			$arr[$i]['id']= $row['cab_id'];
			$arr[$i]['oneway_id']= $row['oneway_id'];
			$arr[$i]['cab_id']= $row['cab_id'];
			$arr[$i]['cab_name'] = $row['cab_name'];
			$arr[$i]['price']= $row['price'];	
			$arr[$i]['status']= $row['status'];
			$i++;
		}
		return $arr;
		
	}
	function update($data){
		$sql= "UPDATE oneway_cabs SET ";
		$r=0;
		if(isset($data['price'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." price= '".$data['price']."'";
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
		$sql= "DELETE FROM oneway_cabs WHERE id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}
?>