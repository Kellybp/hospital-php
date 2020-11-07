<?php
 if(!isset($_SESSION)) {
         session_start();
      }
 if($_SESSION['type'] != 'admin') {
         header('Location: ../index.php');
      }    
  include("../Models/view_components/header.php");
  
  if(isset($_SESSION['uname'])){
	require_once("../Models/database.php");
	$queryBegin = 'SELECT * FROM Employees WHERE Employee_Types = ';
	$queryEnd = 'ORDER BY Employee_FName';
	$medQuery = 'SELECT * FROM medications';
	$allergyQuery = 'SELECT * FROM allergies';

	$empDoc = $db->query($queryBegin.'"doc"'.$queryEnd);
	$empRec = $db->query($queryBegin.'"rec"'.$queryEnd);
	$empNur = $db->query($queryBegin.'"nurse"'.$queryEnd);
	$empAdm = $db->query($queryBegin.'"admin"'.$queryEnd);
	$allergy = $db->query($allergyQuery);
	$meds = $db->query($medQuery);

  } else{
  	$empDoc = "0";
  }
	  include("../Models/view_components/nav.php");
  	include("../Models/view_components/sidebar.php");
  	include("../Models/view_components/modal.php");
  	include("../Models/addModals/medication_add.php");
  	include("../Models/addModals/allergy_add.php");
  	include("../Models/updateModals/admin_um.php");
  	include("../Models/updateModals/admin_allUM.php");
  	include("../Models/updateModals/admin_medUM.php");
  	include("../Models/addModals/admin_add.php");
?>
<p class="leftNav">
	
	<p>
		<br/>
		<br/>
		<div class="leftBody">
		<p class="warning red">You are about to be logged off</p>
			<div id="doc" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>First Name</strong>
							</td>
							<td>
								<strong>Last Name</strong>
							</td>
							<td>
								<strong>Contact Number</strong>
							</td>
							<td>
								<strong>Is Current Employee</strong>
							</td>
							<td>
								<strong>Update</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($empDoc != "0"){
						foreach($empDoc as $emps) : ?>
						<tr>
							<td id="empName">
								<?php echo $emps['Employee_FName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_LName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_ContactNum']; ?>
							</td>
							<td>
								<div class="switch">
								    <label class="disLabel black-text">
								      Terminated
								      <input <?php if ($emps['Employee_CurrentlyWorking'] == 1) echo 'checked' ?> disabled type="checkbox" >
								      <span class="lever"></span>
								      Currently Working
								    </label>
								</div>
							</td>
							<td>
								<a href="#modal3" class="waves-effect waves-light btn modal-trigger")" onclick="updateValue('<?php echo $emps['EmployeeID']; ?>','<?php echo $emps['Employee_FName']; ?>','<?php echo $emps['Employee_LName']; ?>','<?php echo $emps['Employee_ContactNum']; ?>','<?php echo $emps['Employee_CurrentlyWorking']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
			</div>
			<div id="recep" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>First Name</strong>
							</td>
							<td>
								<strong>Last Name</strong>
							</td>
							<td>
								<strong>Contact Number</strong>
							</td>
							<td>
								<strong>Is Current Employee</strong>
							</td>
							<td>
								<strong>Update</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($empRec != "0"){
						foreach($empRec as $emps) : ?>
						<tr>
							<td id="empName">
								<?php echo $emps['Employee_FName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_LName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_ContactNum']; ?>
							</td>
							<td>
								<div class="switch">
								    <label class="disLabel black-text">
								      Terminated
								      <input <?php if ($emps['Employee_CurrentlyWorking'] == 1) echo 'checked' ?> disabled type="checkbox" >
								      <span class="lever"></span>
								      Currently Working
								    </label>
								</div>
							</td>
							<td>
								<a href="#modal3" class="waves-effect waves-light btn modal-trigger")" onclick="updateValue('<?php echo $emps['EmployeeID']; ?>','<?php echo $emps['Employee_FName']; ?>','<?php echo $emps['Employee_LName']; ?>','<?php echo $emps['Employee_ContactNum']; ?>','<?php echo $emps['Employee_CurrentlyWorking']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>		
			</div>
			<div id="nurse" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>First Name</strong>
							</td>
							<td>
								<strong>Last Name</strong>
							</td>
							<td>
								<strong>Contact Number</strong>
							</td>
							<td>
								<strong>Is Current Employee</strong>
							</td>
							<td>
								<strong>Update</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($empNur != "0"){
						foreach($empNur as $emps) : ?>
						<tr>
							<td id="empName">
								<?php echo $emps['Employee_FName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_LName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_ContactNum']; ?>
							</td>
							<td>
								<div class="switch">
								    <label class="disLabel black-text">
								      Terminated
								      <input <?php if ($emps['Employee_CurrentlyWorking'] == 1) echo 'checked' ?> disabled type="checkbox" >
								      <span class="lever"></span>
								      Currently Working
								    </label>
								</div>
							</td>
							<td>
								<a href="#modal3" class="waves-effect waves-light btn modal-trigger")" onclick="updateValue('<?php echo $emps['EmployeeID']; ?>','<?php echo $emps['Employee_FName']; ?>','<?php echo $emps['Employee_LName']; ?>','<?php echo $emps['Employee_ContactNum']; ?>','<?php echo $emps['Employee_CurrentlyWorking']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
			</div>
			<div id="admin" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>First Name</strong>
							</td>
							<td>
								<strong>Last Name</strong>
							</td>
							<td>
								<strong>Contact Number</strong>
							</td>
							<td>
								<strong>Is Current Employee</strong>
							</td>
							<td>
								<strong>Update</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($empAdm != "0"){
						foreach($empAdm as $emps) : ?>
						<tr>
							<td id="empName">
								<?php echo $emps['Employee_FName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_LName']; ?>
							</td>
							<td>
								<?php echo $emps['Employee_ContactNum']; ?>
							</td>
							<td>
								<div class="switch">
								    <label class="disLabel black-text">
								      Terminated
								      <input <?php if ($emps['Employee_CurrentlyWorking'] == 1) echo 'checked' ?> disabled type="checkbox" >
								      <span class="lever"></span>
								      Currently Working
								    </label>
								</div>
							</td>
							<td>
								<a href="#modal3" class="waves-effect waves-light btn modal-trigger")" onclick="updateValue('<?php echo $emps['EmployeeID']; ?>','<?php echo $emps['Employee_FName']; ?>','<?php echo $emps['Employee_LName']; ?>','<?php echo $emps['Employee_ContactNum']; ?>','<?php echo $emps['Employee_CurrentlyWorking']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
			</div>
			<div id="med" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>Medication Name</strong>
							</td>
							<td>
								Update
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($meds != "0"){
						foreach($meds as $med) : ?>
						<tr>
							<td>
								<?php echo $med['name']; ?>
							</td>
							<td>
								<a href="#modal3Med" class="waves-effect waves-light btn modal-trigger")" onclick="updateMed('<?php echo $med['medicationID']; ?>','<?php echo $med['name']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
			</div>
			<div id="allergy" style="display:none;">
				<table class="striped">
					<thead>
						<tr>
							<td>
								<strong>Allergy Name</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php if ($allergy != "0"){
						foreach($allergy as $allergys) : ?>
						<tr>
							<td>
								<?php echo $allergys['name']; ?>
							</td>
							<td>
								<a href="#modal3All" class="waves-effect waves-light btn modal-trigger")" onclick="updateAll('<?php echo $allergys['allergyID']; ?>','<?php echo $allergys['name']; ?>')">Update</a>
							</td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
			</div>
			<?php include("../Models/view_components/logoutTimer.php") ?>
		</div>
	</p>
</p>
<div>
	<div class="fixed-action-btn" id="employees"  style="display:none;">
	  <a href="#modal4" class="btn-floating btn-large waves-effect waves-light btn modal-trigger">
	    <i class="large material-icons">add</i>
	  </a>
	</div>
	<div class="fixed-action-btn" id="medM"  style="display:none;">
	  <a id="addBtn" href="#modal4Med" onclick="add()" class="btn-floating btn-large waves-effect waves-light btn modal-trigger">
	    <i class="large material-icons">add</i>
	  </a>
	</div>
	<div class="fixed-action-btn" id="all"  style="display:none;">
	  <a id="addBtn" href="#modal4All" class="btn-floating btn-large waves-effect waves-light btn modal-trigger">
	    <i class="large material-icons">add</i>
	  </a>
	</div>
</div>
   <script>
   	function updateMed(value, name){
   		document.getElementById("updateMID").value = value;
		document.getElementById("updateMedName").value = name;
   	}
   	function updateAll(value, name){
   		document.getElementById("updateAID").value = value;
		document.getElementById("updateAllName").value = name;
   	}
	function updateValue(value, fName, lName, contact, current){
		document.getElementById("updateId").value = value;
		document.getElementById("updateFName").value = fName;
		document.getElementById("updateLName").value = lName;
		document.getElementById("updateContactNum").value = contact;
		if(current){
			document.getElementById("updateCurrentlyWorking").checked = true;
			document.getElementById("updateCW").value = current;
		} else {
			document.getElementById("updateCurrentlyWorking").checked = false;
		}
	}
	</script>
<?php include("../Models/view_components/footer.php"); ?>