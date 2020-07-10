<?php require_once('../Connections/datalp2m.php'); ?>
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

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "tambah")) {
  $insertSQL = sprintf("INSERT INTO tb_dokumen (nama_dokumen, unit, tipe, lampiran) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama_dokumen'], "text"),
                       GetSQLValueString($_POST['unit'], "text"),
                       GetSQLValueString($_POST['tipe'], "text"),
                       GetSQLValueString($_FILES['lampiran']['name'], "text"));

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $insertSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  
  move_uploaded_file($_FILES['lampiran']['tmp_name'], '../files/dokumen/'.$_FILES['lampiran']['name']);
  
  
  if($_SESSION['jabatan'] == "Admin" ){
	  if($_POST['tipe'] == "sk" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/skpp.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/srpp.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/stpp.php\";</script>";
	  }else if($_POST['tipe'] == "hp" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/hppp.php\";</script>";
    }else if($_POST['tipe'] == "btl" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/btlpp.php\";</script>";
    }else if($_POST['tipe'] == "sk" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/skpm.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/srpm.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/stpm.php\";</script>";
	  }else if($_POST['tipe'] == "sk" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/skga.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/srga.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../admin/stga.php\";</script>";
	  }
  }else if($_SESSION['jabatan'] == "Staff"){
if($_POST['tipe'] == "sk" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/skpp.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/srpp.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/stpp.php\";</script>";
	  }else if($_POST['tipe'] == "hp" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/hppp.php\";</script>";
    }else if($_POST['tipe'] == "btl" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/btlpp.php\";</script>";
    }else if($_POST['tipe'] == "sk" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/skpm.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/srpm.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/stpm.php\";</script>";
	  }else if($_POST['tipe'] == "sk" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/skga.php\";</script>";
	  }else if($_POST['tipe'] == "sr" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/srga.php\";</script>";
	  }else if($_POST['tipe'] == "st" && $_POST['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('Data Berhasil Di Tambah'); location.href=\"../staff/stga.php\";</script>";
	  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ADMIN</title>


  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datetimepicker/datertimepicker.css" />
 

   <!-- Favicons -->
  <link href="../images/logo/header_logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <!-- Custom styles for this template -->
  <link href="../css/admin/style.css" rel="stylesheet">
  <link href="../css/admin/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
  
  <?php include('header.php'); ?>
  
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      <p>&nbsp;</p>
        <h3><i class="fa fa-angle-right"></i> Tambah Data Dokumen</h3>
        <div class="row mt">
          <!--  Form -->
          
          <?php include ('../data/data_input/input_dokumen.php'); ?>
          
        </div>
        <!-- /row -->
       
       
       
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
 
      
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../lib/advanced-form-components.js"></script>

</body>

</html>
