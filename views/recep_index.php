<?php
 if(!isset($_SESSION)) {
         session_start();
      }
 if($_SESSION['type'] != 'rec') {
         header('Location: ../index.php');
      }    
  include("../Models/header.php");
  
  if(isset($_SESSION['uname'])){
	require_once("../Models/user_database.php");
	$pQuery = 'SELECT * FROM patients';
	$aQuery = "SELECT * FROM appointments WHERE date_time >= NOW()  
				AND record_type = 'Other'
				LIMIT 15";

	$ps = $db->query($pQuery);
	$as = $db->query($aQuery);

  } 
  	include("../Models/nav.php");
  	include("../Models/sidebar.php");
  	include("../Models/modal.php");
?>
<p class="leftNav">
	<p>
		<br/>
		<br/>
		<div class="leftBody">
			<div id="pats">
				<?php if ($ps != "0"){
						foreach($ps as $pss) : ?>
				<form action='../patientManager/update_patient_recep.php' method='POST' id='update_patient_form'>
					<input id='updatePID' type='hidden' name='updatePID' value="<?php echo $pss['patientID']?>"/>
					<div class='row'>
			            <div class='input-field col s3'>
			               <input id='name' value='<?php echo $pss['name']; ?>' name='name' type='text' class='validate' maxlength='30'>
			               <label class='active' for='name'>Name</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='phone' value='<?php echo $pss['homePhone']; ?>' name='phone' type='text' class='validate' maxlength='10'>
			               <label class='active' for='phone'>Home Phone</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='bDay' value='<?php echo $pss['birthDate']; ?>' name='bDay' type='text' class='validate' maxlength='10'>
			               <label class='active' for='bDay'>Birth Date</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='address' value='<?php echo $pss['address']; ?>' name='address' type='text' class='validate' maxlength='150'>
			               <label class='active' for='address'>Medication</label>
			            </div>
			         </div>
			        <div class='row'>
			            <div class='input-field col s3'>
			               <input id='gender' value='<?php echo $pss['gender']; ?>' name='gender' type='text' class='validate' maxlength='30'>
			               <label class='active' for='gender'>Gender</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='insurance' value='<?php echo $pss['insurance']; ?>' name='insurance' type='text' class='validate' maxlength='10'>
			               <label class='active' for='insurance'>Insurance</label>
			            </div>
			         </div>
			        <div class='row'>
			            <div class='input-field col s3'>
			               <input id='Cname' value='<?php echo $pss['contactName']; ?>' name='Cname' type='text' class='validate' maxlength='30'>
			               <label class='active' for='Cname'>Contact Name</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='Cnum' value='<?php echo $pss['contactNum']; ?>' name='Cnum' type='text' class='validate' maxlength='10'>
			               <label class='active' for='Cnum'>Contact Number</label>
			            </div>
			            <div class='input-field col s3'>
			               <input id='Crel' value='<?php echo $pss['contactRelation']; ?>' name='Crel' type='text' class='validate' maxlength='10'>
			               <label class='active' for='Crel'>Contact Relation</label>
			            </div>
			         </div>
			          <button class='right modal-close waves-effect waves-blue btn' type='submit' name='confirmChange'>Update
		             </button>
				</form>
				<br>
				<br>
				<br>
				<br>
				<?php endforeach;} ?>
			</div>
			<div id="appt">
				<form action='../patientManager/new_appt.php' method='POST' id='new_appointment'>
					<div class='row'>
			            <div class='input-field col s3'>
			               <input id='name' value='<?php echo $pss['name']; ?>' name='name' type='text' class='validate' maxlength='30'>
			               <label class='active' for='name'>Name</label>
			            </div>
			          </div>
			           <button class='right modal-close waves-effect waves-blue btn' type='submit' name='confirmChange'>Update
		             </button>
				</form>
			</div>
		</div>
	</p>
</p>
<div>
	<div class="fixed-action-btn" id="newPatient" style="display:none;">
	<!--  <a id="addBtn" href="#" onclick="add()" class="btn-floating btn-large waves-effect waves-light btn modal-trigger">
	    <i class="large material-icons">add</i>
	  </a> -->
	</div>
</div>
   
<?php include("../Models/footer.php"); ?>