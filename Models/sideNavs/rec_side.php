<?php
 if(!isset($_SESSION)) {
         header("Location: ../index.php");
  }
?>

<li id="pat"><a href="#Patients" onclick="displayAdmin('pat', 'pats')">Patients</a></li>
<li id="app"><a href="#Appointments" onclick="displayAdmin('app', 'appt')">Appointments</a></li>

<script>
	window.onload=function(){
   		document.getElementById('pat').className = "active";
		document.getElementById('newPatient').style.display = "block";
   	};
	function displayAdmin(btnString, showString){
		document.getElementById(btnString).className = "active";
		document.getElementById(showString).style.display = "block";
		switch(btnString){
			case 'pat':
				removeNonActive('app', 'appt');
				document.getElementById('newPatient').style.display = "block";
				break;
			case 'app':
				removeNonActive('pat', 'pats');
				document.getElementById('newPatient').style.display = "none";
				break;
		}
	}
	function removeNonActive(btnString, showString){
		document.getElementById(btnString).className = "";
		document.getElementById(showString).style.display = "none";
	}
</script>