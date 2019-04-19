<?php
 if(!isset($_SESSION)) {
         header("Location: ../index.php");
  }
?>

<li id='docBtn'><a href="#Doctor" onclick="displayAdmin('docBtn', 'doc')">Doctors</a></li>
<li id='nurseBtn'><a href="#Nurse" onclick="displayAdmin('nurseBtn', 'nurse')">Nurses</a></li>
<li id='recepBtn'><a href="#Receptionist" onclick="displayAdmin('recepBtn', 'recep')">Receptionists</a></li>
<li id='adminBtn'><a href="#Admin" onclick="displayAdmin('adminBtn', 'admin')">Admins</a></li>
<hr>
<li id='medBtn'><a href="#Medications" onclick="displayAdmin('medBtn', 'med')">Medications</a></li>
<li id='allergyBtn'><a href="#Allergies" onclick="displayAdmin('allergyBtn', 'allergy')">Allergies</a></li>
<script>
	window.onload=function(){
   		document.getElementById('docBtn').className = "active";
		document.getElementById('doc').style.display = "block";
		document.getElementById('medM').style.display = "none";
		document.getElementById('all').style.display = "none";
		document.getElementById('employees').style.display = "block";
   	};
	function displayAdmin(btnString, showString){
		document.getElementById(btnString).className = "active";
		document.getElementById(showString).style.display = "block";
		if(btnString == 'allergyBtn'){
			document.getElementById('all').style.display = "block";
			document.getElementById('medM').style.display = "none";
			document.getElementById('employees').style.display = "none";
		} else if(btnString == 'medBtn'){
			document.getElementById('medM').style.display = "block";
			document.getElementById('all').style.display = "none";
			document.getElementById('employees').style.display = "none";
		}
		else{
			document.getElementById('all').style.display = "none";
			document.getElementById('medM').style.display = "none";
			document.getElementById('employees').style.display = "block";
		}

		switch(btnString){
			case 'docBtn':
				removeNonActive('nurseBtn', 'nurse');
				removeNonActive('recepBtn', 'recep');
				removeNonActive('adminBtn', 'admin');
				removeNonActive('medBtn', 'med');
				removeNonActive('allergyBtn', 'allergy');
				break;
			case 'nurseBtn':
				removeNonActive('docBtn', 'doc');
				removeNonActive('recepBtn', 'recep');
				removeNonActive('adminBtn', 'admin');
				removeNonActive('medBtn', 'med');
				removeNonActive('allergyBtn', 'allergy');
				break;
			case 'recepBtn':
				removeNonActive('nurseBtn', 'nurse');
				removeNonActive('docBtn', 'doc');
				removeNonActive('adminBtn', 'admin');
				removeNonActive('medBtn', 'med');
				removeNonActive('allergyBtn', 'allergy');
				break;
			case 'medBtn':
				removeNonActive('docBtn', 'doc');
				removeNonActive('nurseBtn', 'nurse');
				removeNonActive('recepBtn', 'recep');
				removeNonActive('adminBtn', 'admin');
				removeNonActive('allergyBtn', 'allergy');
				break;
			case 'allergyBtn':
				removeNonActive('docBtn', 'doc');
				removeNonActive('nurseBtn', 'nurse');
				removeNonActive('recepBtn', 'recep');
				removeNonActive('adminBtn', 'admin');
				removeNonActive('medBtn', 'med');
				break;
			case 'adminBtn':
				removeNonActive('nurseBtn', 'nurse');
				removeNonActive('recepBtn', 'recep');
				removeNonActive('docBtn', 'doc');
				removeNonActive('medBtn', 'med');
				removeNonActive('allergyBtn', 'allergy');
				break;
		}
	}
	function removeNonActive(btnString, showString){
		document.getElementById(btnString).className = "";
		document.getElementById(showString).style.display = "none";
	}
</script>