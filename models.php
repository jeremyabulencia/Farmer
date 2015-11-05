<?php
	function connection(){
		$conn = mysqli_connect('localhost', 'root', 'mogwai');
		$db = mysqli_select_db($conn,'farm');

		return $conn;
	}

	function getPlantType(){
		$conn = connection();
		$sql = "SELECT * from plant";

		$query = mysqli_query($conn,$sql);
		
		if($query){
			$array = array();
			while($data = mysqli_fetch_array($query)){
				$arr 			=	array();
				$arr['id']		= 	$data['id'];
				$arr['name']	=	$data['name'];
				$array[]		=	$arr;
			}
		}else{
			$array = false;
		}

		return $array;
	}

	function addPlantType($name){
		$conn = connection();
		$sql = "INSERT INTO plant (name) VALUES ('".$name."')";
		if(mysqli_query($conn,$sql)){
			echo "success";
		}else{
			echo "failed";
		}

	}

	function addSlot(){
		$conn = connection();
		$sql = "INSERT INTO slot (status) values (0)";

		if(mysqli_query($conn,$sql)){
			// echo "success";
		}else{
			// echo "failed";
		}
	}

	function getSlots(){
		$conn = connection();
		$sql = "SELECT * from slot";

		$query = mysqli_query($conn,$sql);
		
		$array = array();
		while($data = mysqli_fetch_array($query)){
			$arr 				= array();
			$arr['id'] 			= $data['id'];
			$arr['status'] 		= $data['status'];
			$arr['plant_id'] 	= $data['plant_id'];
			
			$array[] = $arr;
		}

		return $array;
	}

	function slotDetail($slotId){
		$conn = connection();
		$sql = 'SELECT 
					slot.id as id, slot.status,slot.plant_id, slot.planted_date, plant.name 
				from 
					slot left join plant ON plant.id=slot.plant_id 
				WHERE 
					slot.id='.$slotId;

		$query = mysqli_query($conn,$sql);

		$array = array(); 
		while($data = mysqli_fetch_array($query)){
			$array['id'] 			= $data['id'];
			$array['status'] 		= $data['status'];
			$array['plant_id'] 		= $data['plant_id'];
			$array['planted_date'] 	= $data['planted_date'];
			$array['plant_name']	= $data['name'];
		}

		return $array;
	}
?>