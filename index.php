<?php 
	// require("connection.php");
	require("models.php"); 
?>
<?php
	if($_POST['addSlot']){
		addSlot();
	}
	if($_POST['addPlantName']){
		addPlantType($_POST['plantName']);
	}
?>
<html>
	<head>
		
	</head>
	<body>
		<div id="addPlantType" class="modal hide">
			<div class="modalbody">
				<a href="" class="close right">close</a>
				<form action="index.php" method="post">
					<input type="text" name="plantName" placeholder="Enter Plant Name">
					<input type="submit" name="addPlantName" value="Add">
				</form>
			</div>
		</div>
		<div class="plantType">
			<?php if(getPlantType()){ ?>
				<?php foreach (getPlantType() as $key => $value) { ?>
					<div class="type">
						<?php echo $value['name']; ?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="addType">Add Type</div>
		</div>
		<div class="content">
			<?php if(getSlots()){ ?>
				<?php foreach(getSlots() as $key => $value){ ?>
					<div class="Slot" id="<?php echo $value['id']; ?>">
						<?php $status = ($value['status'] == 0) ? "Vacant" : "Occupied"; ?>
						<?php echo $status; ?> <br/>
						<?php if($value['status'] == 1){ ?>
								<?php $detail = slotDetail($value['id']); ?>
								<?php echo $detail['plant_name']; ?> 
								<br/><br/>
								<a href="">Harvest</a>
								<a href="view.php?slotId=<?php echo $value['id']?>">View</a>
						<?php }else { ?>
							<br/><br/>
							<a href="">Plant New</a>
						<?php } ?>
						
					</div>
				<?php } ?>	
			<?php } ?>
			<form action="index.php" method="post">
				<input type="submit" name="addSlot" value="Add Slot" class="addSlot">
			</form>
		</div>
	</body>
</html>
<link rel="stylesheet" href="style/style.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/scripts.js"></script>