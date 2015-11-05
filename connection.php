<?php 
	function connection(){
		$conn = mysqli_connect('localhost', 'root', '');
		$db = mysqli_select_db($conn,'farm');

		return $conn;
	}
?>