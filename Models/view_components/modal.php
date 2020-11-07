<?php 
	if(!isset($_SESSION)) {
     session_start();
  	} 
?>
<!-- Modal Structure -->
<div id="modal1" class="modal">
	<?php
		if(isset($_SESSION['uname'])){
			echo "<form action='../Models/session/logout.php' method='POST'>
					<div class='modal-content'>
					<h4>Logout</h4>
						<p>Are you sure your want to logout?</p>
					</div>
					<div class='modal-footer'>
			    		<button class='right modal-close waves-effect waves-green btn' type='submit' name='logout'>Logout
			    		</button>
					</div>
				</form>
				<button class=' modalBtn left modal-close waves-effect waves-green btn' name='close'>Close
			    </button>";
		} 
	?>
</div>