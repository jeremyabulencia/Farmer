<?php 
	function connection(){
		$conn = mysqli_connect('localhost', 'root', 'mogwai');
		$db = mysqli_select_db($conn,'farm');

		return $conn;
	}
?>