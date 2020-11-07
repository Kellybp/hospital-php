<?php 
	if(!isset($_SESSION)) {
		header('Location: ../index.php');
	   }
	include("../../Models/view_components/viewHeader.php"); 
?>
<div class="hero-image">
   <div class="hero-text">
      <div id="login" class="center" style="margin-top: 25%;">
         <h3>Sorry, this page is not available</h3>
		 <h3>Please contact an administrator </h3>
		 <div class="center">
		 	<a href="../index.php" class='modal-close waves-effect waves-green btn'>Home</a>
		 </div>
      </div>
   </div>
</div>
</body>
</html>