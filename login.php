<?php require_once('Connections/datalp2m.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
 
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysqli_select_db( $datalp2m, $database_datalp2m);
  
  $LoginRS__query=sprintf("SELECT * FROM tb_admin WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query( $datalp2m, $LoginRS__query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  $mu = mysqli_fetch_assoc($LoginRS);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	
	 $_SESSION['jabatan'] = $mu['jabatan'] ;
	  $_SESSION['nama_admin'] = $mu['nama_admin'] ;
	   $_SESSION['nip'] = $mu['nip'] ;
	  $_SESSION['alamat_admin'] = $mu['alamat_admin'] ;	 
	   $_SESSION['cp'] = $mu['cp'] ;
	  $_SESSION['foto'] = $mu['foto'] ;
	   $_SESSION['id_admin'] = $mu['id_admin'] ;     

 if($_SESSION['jabatan'] == "Admin" ){
  $MM_redirectLoginSuccess = "admin/dashboard.php";
  }else if($_SESSION['jabatan'] == "Staff"){
  $MM_redirectLoginSuccess = "staff/dashboard.php";
	  }else{
		   $MM_redirectLoginSuccess = "login.php";
		  }

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
	
  }
  else {
	echo " <script type='text/javascript'>alert('Username atau Password salah'); location.href=\"login.php\";</script>";

	
  }
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
  <!-- Favicons -->
  <link href="images/logo/header_logo.png" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/admin/style.css" rel="stylesheet">
  <link href="css/admin/style-responsive.css" rel="stylesheet">
</head>

<body>
<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 
    <div class=" form-login pull-left no-margin">
    <h2 class="form-login-heading"><img src="images/logo/header_logo.png" class="logo" width="200" height="200"> <br/> <strong>APLIKASI DATALP2M UIN ANTASARI</strong></h2>
        <p>&nbsp;</p>
          <p>&nbsp;</p>
          <h4 class="centered"><strong>LOGIN</strong></h4>
            <p>&nbsp;</p>
      <form name="login" method="post"  action="<?php $loginFormAction ?>">
        
        <div class="login-wrap">
          <input name="username" type="text" class="form-control" placeholder="Username" autofocus required>
          <br>
          <input name="password" type="password" class="form-control" placeholder="Password" required>
          <hr>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-sign-in"></i> LOGIN</button>
          <hr>
        
        
        </div>
      
      </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
    </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("images/2.jpg", {
      speed: 500
    });
  </script>
</body>
</html>