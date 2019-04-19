<?php 
   if(!isset($_SESSION)) {
      header('Location: ../index.php');
    }    
?>
<!-- Modal Structure -->
<div id="modal3All" class="modal">
   <?php
      if(isset($_SESSION['uname'])){
      	echo " <form class='col s9' action='../otherManager/update_allergy.php' method='POST' id='update_allergy_form'>
       <input id='updateAID' type='hidden' name='updateAID' value=''/>
       <div class='modal-content'>
         <h4>Update Allergy Name</h4>
         <div class='row'>
            <div class='input-field col s6'>
               <input id='updateAllName' value='' name='updateAllName' type='text' class='validate' maxlength='30'>
               <label class='active' for='fName'>Allergy Name</label>
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