<script>
	function validate(){
		//Username special character validation
		if( /[^a-zA-Z0-9\-\/]/.test(document.getElementById('uname').value ) ) {
		    document.getElementById('unameCorrection').innerHTML = 'Username should only be letters or numbers';
		    return false;
	    }
	    else{
	     document.getElementById('unameCorrection').innerHTML = ''; 
	 	}

	 	//Password Empty Validation
	    if(document.getElementById('Password').value == '' ||  document.getElementById('Password').value == NaN) {
		    document.getElementById('passCorrection').innerHTML = 'Please enter Password';
		    return false;
	    }
	    else{ 
	    	document.getElementById('passCorrection').innerHTML = ''; 
	    }

	    //Username Empty Validation
	    if(document.getElementById('uname').value == '' ||  document.getElementById('uname').value == NaN) {
		    document.getElementById('unameCorrection').innerHTML = 'Please enter Username';
		    return false;
	    }
	    else{ 
	    	document.getElementById('passCorrection').innerHTML = ''; 
	    }
		return true;
	}
</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>