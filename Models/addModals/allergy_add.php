<?php 
   if(!isset($_SESSION)) {
      header('Location: home.php');
    }    
?>
<!-- Modal Structure -->
<div id="modal4All" class="modal">
   <?php
      if(isset($_SESSION['uname'])){
       echo "<form action='../otherManager/add_allergy.php' method='POST' id='add_employee_form'>
         <div class='modal-content'>
           <h4>New Allergy</h4>
           <div class='row'>
              <div class='input-field col s6'>
                 <input id='allName' value='' name='allName' type='text' class='validate' maxlength='30'>
                 <label class='active' for='allName'>Allergy Name</label>
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