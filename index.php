<?php
 include("Models/indexHeader.php");

 if(!isset($_SESSION)) {
         session_start();
  }

?>
<div class="hero-image">
   <div class="hero-text">
    <!--B-Ryans Asshat Clinic-->
      <div id="login" class="formAlign" >
         <form action="Models/session/login.php" onsubmit="return validate()" method='POST'>
            <div class="container">
               <h4>Login</h4>
               <br />
               <div class='row'>
                  <div class='input-field'>
                     <input name='uname' placeholder="User Name" type='text' class='validate' maxlength='30' id="uname">
                     <label class='active' for='uname'>User Name</label>
                     <p id="unameCorrection"></p>
                  </div>
               </div>
               <br />
               <div class='row'>
                  <div class='input-field'>
                     <input name='Password' placeholder="Password" type='password' class='validate' maxlength='30' id="Password">
                     <label class='active' for='Password'>Password</label>
                      <p id="passCorrection"></p>
                  </div>
               </div>
            </div>
            <div>
              <br />
               <button class='right waves-effect waves-blue btn' type='submit' name='deleteConfirm' style="margin-right: 10%;">Login
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php include("Models/indexfooter.php"); ?>