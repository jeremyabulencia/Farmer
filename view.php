<?php
	include "models.php";
	$details = slotDetail($_GET['slotId']);
?>
<?php if($details['status'] == 1){ ?>
	<h1>Plant:<?php echo $details['plant_name']; ?></h1>
	<h4>Planted Date:<?php echo $details['planted_date']; ?></h4>
	<h6>Status: <?php echo ($details['status'] == 1) ? "Occupied" : "Vacant"; ?></h6>
<?php }else{ ?>
	<h2>Status:Vacant</h2>
<?php } ?>