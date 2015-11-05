<?php
	require("models.php");
	$details = slotDetail($_GET['slotId']);

	print_r($details);
?>