<?php
 if(!isset($_SESSION)) {
         session_start();
      }
 if($_SESSION['type'] != 'doc') {
         header('Location: ../index.php');
      }    
  include("../Models/header.php");
  
  if(isset($_SESSION['uname'])){
	require_once("../Models/user_database.php");
	//Appointments beyond present
	$query = "SELECT * FROM appointments as a
			INNER JOIN records as r ON a.apptID = r.apptID
			INNER JOIN patients as p ON a.patientID = p.patientID
			WHERE r.date_time >= NOW()  
				AND r.record_type = 'Other'
				LIMIT 15";
	$appointments = $db->query($query);
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
			<?php if ($appointments != "0"){
					foreach($appointments as $appointment) : ?>
				<form action='../patientManager/update_patient.php' method='POST' id='update_patient_form'>
					<input id='updatePID' type='hidden' name='updatePID' value="<?php echo $appointment['patientID']?>"/>
					<input id='updateRID' type='hidden' name='updateRID' value="<?php echo $appointment['recordID']?>"/>
					<input id='updateAID' type='hidden' name='updateAID' value="<?php echo $appointment['apptID']?>"/>
				<div class='row'>
		            <div class='input-field col s3'>
		               <input id='name' disabled value='<?php echo $appointment['name']; ?>' name='name' type='text' class='validate' maxlength='0'>
		               <label class='active' for='name'>Name</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='reason' disabled value='<?php echo $appointment['reason']; ?>' name='reason' type='text' class='validate' maxlength='0'>
		               <label class='active' for='reason'>Reason</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='allergy' disabled value='<?php echo $appointment['medicationID']; ?>' name='allergy' type='text' class='validate' maxlength='0'>
		               <label class='active' for='allergy'>Allergy</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='meds' disabled value='<?php echo $appointment['allergyID']; ?>' name='meds' type='text' class='validate' maxlength='0'>
		               <label class='active' for='meds'>Medication</label>
		            </div>
		         </div>

		         <div class='row'>
		            <div class='input-field col s3'>
		               <input id='updateHeight' value='<?php echo $appointment['height']; ?>' name='updateHeight' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updateHeight'>Height</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='updateWeight' value='<?php echo $appointment['weight']; ?>' name='updateWeight' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updateWeight'>Weight</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='updateTemp' value='<?php echo $appointment['temp']; ?>' name='updateTemp' type='text' class='validate' maxlength='6'>
		               <label class='active' for='updateTemp'>Temp</label>
		            </div>
		            <!--sdfklsdlfjlsakdj-->
		            <div class='input-field col s3'>
		               <input id='updateTempS' value='<?php echo $appointment['temp_site']; ?>' name='updateTempS' type='text' class='validate' maxlength='30'>
		               <label class='active' for='updateTempS'>Temp Site</label>
		            </div>
		         </div>

		          <div class='row'>
		            <div class='input-field col s3'>
		               <input id='updatePRate' value='<?php echo $appointment['pulse_rate']; ?>' name='updatePRate' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updatePRate'>Pulse Rate</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='updateRRate' value='<?php echo $appointment['resp_rate']; ?>' name='updateRRate' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updateRRate'>Respiration Rate</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='updateSys' value='<?php echo $appointment['BP_Systolic']; ?>' name='updateSys' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updateSys'>BP Systolic</label>
		            </div>
		            <div class='input-field col s3'>
		               <input id='updateDia' value='<?php echo $appointment['BP_Diastolic']; ?>' name='updateDia' type='text' class='validate' maxlength='10'>
		               <label class='active' for='updateDia'>BP Diastolic</label>
		            </div>
		         </div>

		         <div class='row'>
		            <div class='input-field col s6'>
		               <input id='pHistory' value='<?php echo $appointment['personalHealthHistory']; ?>' name='pHistory' type='text' class='validate' maxlength='1000'>
		               <label class='active' for='pHistory'>Personal History</label>
		            </div>
		            <div class='input-field col s6'>
		               <input id='fHistory' value='<?php echo $appointment['familialHealthHistory']; ?>' name='fHistory' type='text' class='validate' maxlength='1000'>
		               <label class='active' for='fHistory'>Familial History</label>
		            </div>
		         </div>

		         <div class='row'>
		            <div class='input-field col s6'>
		               <input id='docNote' value='<?php echo $appointment['docNotes']; ?>' name='docNote' type='text' class='validate' maxlength='500'>
		               <label class='active' for='docNote'>Doctor Notes</label>
		            </div>
		            <div class='input-field col s6'>
		               <input id='fNotes' value='<?php echo $appointment['further_notes']; ?>' name='fNotes' type='text' class='validate' maxlength='500'>
		               <label class='active' for='fNotes'>Further Notes</label>
		            </div>
		         </div>
				 <button class='right modal-close waves-effect waves-blue btn' type='submit' name='updateConfirm'>Update
	             </button>
			</form>
			<br>
			<br>
			<br>
			<br>

			<?php endforeach;} ?>
		</div>
	</p>
</p>
<?php include("../Models/footer.php"); ?>