<?php 
   if(!isset($_SESSION)) {
      header('Location: ../index.php');
    }    
?>
<!-- Modal Structure -->
<div id="modal3" class="modal">
   <?php
      if(isset($_SESSION['uname'])){
      	echo " <form class='col s9' action='../Models/employeeManager/update_employee.php' method='POST' id='update_employee_form'>
       <input id='updateId' type='hidden' name='updateId' value=''/>
       <input type='hidden' id='updateCW' name='updateCurrentlyWorking'>
       <div class='modal-content'>
         <h4>Update</h4>
         <div class='row'>
            <div class='input-field col s6'>
               <input id='updateFName' value='' name='updateFName' type='text' class='validate' maxlength='30'>
               <label class='active' for='fName'>First Name</label>
            </div>
         </div>
         <div class='row'>
            <div class='input-field col s6'>
              <input id='updateLName' value='' name='updateLName' type='text' class='validate' maxlength='30'>
              <label class='active' for='lName'>Last Name</label>
            </div> 
         </div>
          <div class='row'>
            <div class='input-field col s6'>
               <input id='updateContactNum' value='' name='updateContactNum' type='text' class='validate' maxlength='13'>
               <label class='active' for='conNum'>Contact Number</label>
            </div>
         </div>
         <div class='row'>
              <div class='switch'>
            <label class='black-text'>
              Terminated
              <input id='updateCurrentlyWorking' type='checkbox' >
              <span class='lever'></span>
              Currently Working
            </label>
        </div>
         </div>
       </div>
       <div class='modal-footer'>
          <button class='right modal-close waves-effect waves-blue btn' type='submit' name='updateConfirm'>Update
            </button>
        </div>
      </form>
      <button class='modalBtn left modal-close waves-effect waves-green btn' name='close'>Close
            </button>";
      } 	
      ?>
</div>