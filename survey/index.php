<?php 
require_once '../admin2/php_action/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Survey  </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
  <!-- icons -->
    <link href="../admin2/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="../admin2/assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
  <link href="../admin2/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="../admin2/assets/css/pages/extra_pages.css">
  <!-- favicon -->
    <link rel="shortcut icon" href="../admin2/assets/img/favicon.ico" /> 
    <style type="text/css">
      /* Shared */
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">SHEAFFER</span>
</nav>
   <div class="container">
     <div  class="row">
       <div class="col-sm-6 mx-auto">
         
       <div class="card mt-5">
           <div class="card-header">
               <h4>Your views about Cosmetic Future in Pakistan</h4>
           </div>
           <div class="card-body m-2">
               <form action="" method="post" id="form_sub_fm">
            
                       <div class="row form-group">
                        <label>Your Name</label>
                           <input type="text" name="user_name" class="form-control" id="user_name" required>
                       </div>

                        <div class="row form-group">
                            <label>Your Age</label>
                           <input type="number" min="10" name="user_name" class="form-control" id="user_name" required>
                       </div>
                        <div class="row">
                              <label>Do you have some basic cosmetic knowledge? </label>
                        </div>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio2">No</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label>Which makeup brand you are already using ? </label>
                           <input type="text"  name="user_name" class="form-control" id="user_name" required>
                       </div>
                        <!-- start radio -->
                        <div class="row">
                              <label>Do you know any brand Sheaffer ? </label>
                        </div>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio2">No</label>
                            </div>
                        </div>
                        <!-- end radio -->
                          <!-- start radio -->
                        <div class="row">
                              <label>Do you know any brand eyeone ? </label>
                        </div>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                              <label class="custom-control-label" for="customRadio2">No</label>
                            </div>
                        </div>
                        <!-- end radio -->
                           <!-- start radio -->
                       <div class="row form-group">
                            <label>Do you know what is an emulsifying wax ? </label>
                           <input type="text"  name="user_name" class="form-control" id="user_name" required>
                       </div>
                        <div class="row form-group">
                          <button type="submit" class="btn btn-primary"  id="form_subs_btn">Submit</button>
                          </div>
                        <!-- end radio -->

               </form>
               <div class="row" id="success_msg" style="display: none;">
                 <div class="col-sm-12">
                  <div class="alert alert-success">
  <strong>Login with google to submit your opinion</strong> 
</div>
                   <a href="signin.php" class="loginBtn loginBtn--google btn">
  Login with Google
</a>
                 </div>
               </div>
           </div>
       </div>
   
       </div>
     </div>
   </div>
  
    <!-- start js include path -->
    <script src="../admin2/assets/plugins/jquery/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="../admin2/assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="../admin2/assets/js/pages/extra_pages/login.js" ></script>
    <!-- end js include path -->
</body>
</html>
 <script type="text/javascript">
    function form_sub() {
   
    }
       //Save Data into Database
    $("#form_sub_fm").on('submit',function(e) {
        e.preventDefault();
         document.getElementById('form_sub_fm').style.display="none"; 
    document.getElementById('success_msg').style.display="block";    
      
    });//main
   </script>