<?php 
	// require("connection.php");
	include "models.php"; 
?>
<?php
	if(isset($_POST['addSlot'])){
		addSlot();
	}
	if(isset($_POST['addPlantName'])){
		addPlantType($_POST['plantName']);
	}
	if(isset($_POST['plantIt'])){
		plantIt($_POST['Plant']);
	}
	if(isset($_GET['harvest'])){
		harvest($_GET['slotid']);
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
		<div id="plantNewModal" class="modal hide active">
			<div class="modalbody">
				<a href="" class="close right">close</a>
				<form name=Plant action="index.php" method="post">
					<input type="hidden" name=Plant[slot_id]>
					<?php if(getPlantType()){ ?>
						<select name=Plant[plantType]>
							<?php foreach (getPlantType() as $key => $value) { ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
							<?php } ?>
						</select>
						<input type="submit" name="plantIt" value="Submit">
					<?php }else{ ?>
						Please create a type of Plant/Flower first.
					<?php } ?>
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
			<div class="addType">Create Plant/Flower</div>
		</div>
		<div class="content">
			<?php if(getSlots()){ ?>
				<?php foreach(getSlots() as $key => $value){ ?>
					<div class="Slot" id="<?php echo $value['id']; ?>">
						<?php $status = ($value['status'] == 0) ? "Vacant" : "Occupied"; ?>
						<?php echo $status; ?> <br/>
						<?php if($value['status'] == 1){ ?>
								<?php $detail = slotDetail($value['id']); ?>
								<h4><?php echo $detail['plant_name']; ?></h4> 
								<br/><br/>
								<div class="foot">
									<a href="index.php?harvest=true&slotid=<?php echo $value['id']; ?>" class="harvestBtn">Harvest</a>
									<a href="view.php?slotId=<?php echo $value['id']?>" class="viewBtn">View</a>
								</div>
						<?php }else { ?>
							<br/><br/>
							<div class="foot">
								<a href="#" class="plantNew" data-slotId="<?php echo $value['id']; ?>">Plant New</a>
								<a href="view.php?slotId=<?php echo $value['id']?>" class="viewBtn">View</a>
							</div>
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