<?php

require_once 'dbconnect.php';

class OnewayFair extends Database{
	function __construct(){
		parent::__construct();
		$this->_time= date('H:i:s');
		$this->_date= date('y-m-d');
	}
	function create($data){
		$sql= "INSERT INTO oneway_fair( oneway_id, base_fair, toll_tax, fuel_charge, kms_charge, driver_allowance, parking, pickup, other)
		VALUES('".$data['id']."', '".$data['base_fair']."', '".$data['toll_tax']."', '".$data['fuel_charge']."', '".$data['kms_charge']."', '".$data['driver_allowance']."', '".$data['parking']."', '".$data['pickup']."', '".$data['other']."')";
		if ($this->con->query($sql) === TRUE) {
            return $this->con-> insert_id;
        } else {
            return 0;
        }
	}
	function view($data){
		$sql= "SELECT * FROM oneway_fair";
		$r=0;
		if(isset($data['search'])){
			$sql= $sql." WHERE ";
			
			if(isset($data['id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." id = '".$data['id']."'";
				$r++;
			}
			if(isset($data['oneway_id'])){
				if($r>0)
					$sql= $sql." AND ";
				$sql= $sql." oneway_id = '".$data['oneway_id']."'";
				$r++;
			}
			
		}
		$ret= mysqli_query($this->con, $sql);
		$arr= array();
		$i=0;
		while ($row=mysqli_fetch_array($ret)) {
			$arr[$i]['id']= $row['id'];
			$arr[$i]['oneway_id']= $row['oneway_id'];
			$arr[$i]['base_fair']= $row['base_fair'];
			
			$arr[$i]['toll_tax']= $row['toll_tax'];	
			$arr[$i]['fuel_charge']= $row['fuel_charge'];
			$arr[$i]['kms_charge']= $row['kms_charge'];
			$arr[$i]['driver_allowance'] = $row['driver_allowance'];
			$arr[$i]['parking'] = $row['parking'];
			$arr[$i]['pickup'] = $row['pickup'];
			$arr[$i]['other'] = $row['other'];
			$i++;
		}
		return $arr;
		
	}
	function update($data){
		$sql= "UPDATE oneway_fair SET ";
		$r=0;
		if(isset($data['base_fair'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." base_fair= '".$data['base_fair']."'";
			$r++;
		}
		if(isset($data['toll_tax'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." toll_tax= '".$data['toll_tax']."'";
			$r++;
		}
		if(isset($data['fuel_charge'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." fuel_charge= '".$data['fuel_charge']."'";
			$r++;
		}
		if(isset($data['kms_charge'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." kms_charge= '".$data['kms_charge']."'";
			$r++;
		}
		if(isset($data['driver_allowance'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." driver_allowance= '".$data['driver_allowance']."'";
			$r++;
		}
		if(isset($data['parking'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." parking= '".$data['parking']."'";
			$r++;
		}
		if(isset($data['pickup'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." pickup= '".$data['pickup']."'";
			$r++;
		}
		if(isset($data['other'])){
			if($r>0)
				$sql= $sql." , ";
			$sql= $sql." other= '".$data['other']."'";
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
		$sql= "DELETE FROM oneway_fair WHERE id='".$data['id']."'";
		if(mysqli_query($this->con, $sql)){
			return true;
		}else{
			return false;
		}
	}
}
?>