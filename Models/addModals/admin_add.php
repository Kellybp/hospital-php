<?php 
   if(!isset($_SESSION)) {
      header('Location: home.php');
    }    
?>
<!-- Modal Structure -->
<div id="modal4" class="modal">
   <?php
      if(isset($_SESSION['uname'])){
        echo "<form action='../Models/employeeManager/add_employee.php' method='POST' id='update_employee_form'>
       <div class='modal-content'>
         <h4>New Employee</h4>
         <div class='row'>
            <div class='input-field col s6'>
               <input id='addFName' value='' name='addFName' type='text' class='validate' maxlength='30'>
               <label class='active' for='addFName'>First Name</label>
            </div>
            <div class='input-field col s6'>
              <input id='addLName' value='' name='addLName' type='text' class='validate' maxlength='30'>
              <label class='active' for='addLName'>Last Name</label>
            </div> 
         </div>
          <div class='row'>
            <div class='input-field col s6'>
               <input id='addContactNum' value='' name='addContactNum' type='text' class='validate' maxlength='13'>
               <label class='active' for='addContactNum'>Contact Number</label>
            </div>
            <div class='input-field col s6'>
               <select id='addEmployeeTypes' value='' name='addEmployeeTypes' class='btn'>
                    <option value='doc'>Doctor</option>
                    <option value='nurse'>Nurse</option>
                    <option value='rec'>Receptionist</option>
                    <option value='admin'>Admin</option>
               </select> 
               <label class='active' for='addEmployeeTypes'>Position</label>
            </div>
         </div>
         <div class='row'>
            <div class='input-field col s6'>
               <input id='addUserName' value='' name='addUserName' type='text' class='validate' maxlength='13'>
               <label class='active' for='addUserName'>UserName</label>
            </div>
            <div class='input-field col s6'>
               <input id='addPass' value='' name='addPass' type='text' class='validate' maxlength='13'>
               <label class='active' for='addPass'>Password</label>
            </div>
         </div>
       </div>
       <div class='modal-footer'>
          <button class='right modal-close waves-effect waves-blue btn' type='submit' name='addConfirm'>Add
            </button>
        </div>
      </form>
      <button class='modalBtn left modal-close waves-effect waves-green btn' name='close'>Close
            </button>";
      }   
      ?>
</div>