<?php 
 session_start();
  
  if(isset($_SESSION['uname'])){
   $VacaID = trim(filter_input(INPUT_POST, 'vacaID', FILTER_VALIDATE_INT));

   require_once("Models/database.php");
   $stmt = $db->prepare("SELECT * FROM " . $_SESSION['uname'] . " WHERE VacationID = :VacaID");
   
   $stmt->bindParam(':VacaID', $VacaID);
   $stmt->execute();
   $joke = $stmt->fetch();

  } else{
   header('Location: home.php');
  }
   include("Models/header.php");
   include("Models/nav.php");
   include("Models/modal.php");
   ?>
   <main>
      <div id="page">
       <h3 class="white-text">Update Vacas</h3>
       <br/>
         <div class="row">
            <form class="col s9" action="update_vaca.php" method="POST" id="update_vaca_form">
               
            </form>
         </div>
      </div>
   </main>
<?php include("Models./footer.php"); ?>