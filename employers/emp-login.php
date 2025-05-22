<?php
 session_start();
//Database Configuration File
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signin']))
  {
 
    // Getting username/ email and password
    $uname=$_POST['email'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT id,ConcernPerson,EmpEmail,EmpPassword FROM tblemployers WHERE (EmpEmail=:usname )";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $row) {
$hashpass=$row->EmpPassword;
$_SESSION['emplogin']=$row->id;
}
//verifying Password
if (password_verify($password, $hashpass)) {
$_SESSION['userlogin']=$_POST['username'];echo "<script type='text/javascript'> document.location = 'job-listing.php'; </script>";
  } else {
echo "<script>alert('Inavlid login details');</script>";
 
  }
}
//if username or email not found in database
else{
echo "<script>alert('User not registered with us');</script>";
  }
 
}
?>

<!doctype html>

<html>

<head>
<title>Employer SignIn | Hanap-Kita</title>

<link href="../css/custom1.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../css/color.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap.1000&display=swap' rel='stylesheet' type='text/css'>
</head>



<body class="theme-style-1">

<!--WRAPPER START-->

<div id="wrapper"> 

 <?php include('includes/header.php');?>
  <!--HEADER END--> 

  <section id="inner-banner">
    <div class="container">
      <h1>Login To Your Account</h1>
    </div>
  </section>



  

  <!--MAIN START-->

  <div id="main"> 
    <!--SIGNUP SECTION START-->

    <section class="signup-section">

      <div class="container">

        <div class="holder">

          <div class="thumb"><img src="../images/account.png" alt="img"></div>

          <form method="post" name="emplsignin">

            <div class="input-box"> <i class="fa fa-user"></i>

<input type="text" placeholder="Email" name="email"  autocomplete="off" required>

            </div>

            <div class="input-box"> <i class="fa fa-unlock"></i>
<input type="password" class="form-control" name="password" required placeholder="Password">

            </div>

          
            <div class="input-box" style="display: flex; justify-content: center; width: 100%; margin-bottom: 10px;">
    <input type="submit" value="Sign in" name="signin" class="signin-btn" style="width: 100%; padding: 15px 40px;">
</div>

<div class="input-box" style="display: flex; justify-content: center; width: 100%; margin-bottom: 10px;">
    <a href="forgot-password.php" class="login" style="display: block; text-align: center; width: 100%;">Forgot your Password</a>
</div>
            
            
            <b>OR</b>

            <div class="login-social">
              <em>Don’t have an Account? <a href="employers-signup.php">SIGN UP NOW</a></em> </div>

          </form>
          <hr />
<a href="../index.php"><i class="fa fa-home" aria-hidden="true" style="font-size: 30px;padding-top: 10px"></i>  Back Home</a>
        </div>

      </div>

    </section>

    <!--SIGNUP SECTION END--> 

    

  </div>

  <!--MAIN END--> 

  

  <!--FOOTER START-->
  <?php include('includes/footer.php');?>
  <!--FOOTER END--> 

</div>

<script src="../js/jquery-1.11.3.min.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/owl.carousel.min.js"></script> 
<script src="../js/jquery.velocity.min.js"></script> 
<script src="../js/jquery.kenburnsy.js"></script> 
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="../js/jquery.noconflict.js"></script> 

<script src="../js/theme-scripts.js"></script> 
<script src="../js/form.js"></script> 
<script src="../js/custom.js"></script>

</body>

</html>

