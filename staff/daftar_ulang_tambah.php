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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "daftar_kkn")) {
  $tanggal_lahir= date("Y-m-d ", strtotime($_POST['tanggal_lahir']));
  $insertSQL = sprintf("INSERT INTO tb_daftar_ulang (nim, nama, email, fakultas, jurusan, alamat_domisili, alamat_asal, kecamatan_asal, kabupaten_asal, jk, tempat_lahir, tanggal_lahir, semester, no_wa, nama_ortu, no_telp_ortu, alamat_ortu, sks, ipk, tkk, organisasi, keterampilan_keagamaan, ktm, surat_kesediaan, surat_izin, surat_sks_ipk, rincian_transkrip, keterangan_skk, slip_setoran, sertifikat_keterampilan, pas_foto) VALUES (%s, %s, %s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nim'], "text"),
                       GetSQLValueString($_POST['nama'], "text"),
					             GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['fakultas'], "text"),
					             GetSQLValueString($_POST['jurusan'], "text"),
                       GetSQLValueString($_POST['alamat_domisili'], "text"),
					             GetSQLValueString($_POST['alamat_asal'], "text"),
                       GetSQLValueString($_POST['kecamatan_asal'], "text"),
                       GetSQLValueString($_POST['kabupaten_asal'], "text"),
                       GetSQLValueString($_POST['jk'], "text"),
                       GetSQLValueString($_POST['tempat_lahir'], "text"),
                       GetSQLValueString($tanggal_lahir, "date"),
                       GetSQLValueString($_POST['semester'], "text"),
                       GetSQLValueString($_POST['no_wa'], "text"),
                       GetSQLValueString($_POST['nama_ortu'], "text"),
                       GetSQLValueString($_POST['no_telp_ortu'], "text"),
                       GetSQLValueString($_POST['alamat_ortu'], "text"),
                       GetSQLValueString($_POST['sks'], "text"),
                       GetSQLValueString($_POST['ipk'], "text"),
                       GetSQLValueString($_POST['tkk'], "text"),
                       GetSQLValueString($_POST['organisasi'], "text"),
                       GetSQLValueString($_POST['keterampilan_keagamaan'], "text"),
                       GetSQLValueString($_FILES['ktm']['name'], "text"),
                       GetSQLValueString($_FILES['surat_kesediaan']['name'], "text"),
                       GetSQLValueString($_FILES['surat_izin']['name'], "text"),
                       GetSQLValueString($_FILES['surat_sks_ipk']['name'], "text"),
                       GetSQLValueString($_FILES['rincian_transkrip']['name'], "text"),
                       GetSQLValueString($_FILES['keterangan_skk']['name'], "text"),
                       GetSQLValueString($_FILES['slip_setoran']['name'], "text"),
                       GetSQLValueString($_FILES['sertifikat_keterampilan']['name'], "text"),
                       GetSQLValueString($_FILES['pas_foto']['name'], "text"));
					   
					  

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $insertSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  
  move_uploaded_file($_FILES['ktm']['tmp_name'], '../files/dokumen/'.$_FILES['ktm']['name']);
  move_uploaded_file($_FILES['surat_kesediaan']['tmp_name'], '../files/dokumen/'.$_FILES['ktm']['name']);
  move_uploaded_file($_FILES['surat_izin']['tmp_name'], '../files/dokumen/'.$_FILES['surat_izin']['name']);
  move_uploaded_file($_FILES['surat_sks_ipk']['tmp_name'], '../files/dokumen/'.$_FILES['surat_sks_ipk']['name']);
  move_uploaded_file($_FILES['rincian_transkrip']['tmp_name'], '../files/dokumen/'.$_FILES['rincian_transkrip']['name']);
  move_uploaded_file($_FILES['keterangan_skk']['tmp_name'], '../files/dokumen/'.$_FILES['keterangan_skk']['name']);
  move_uploaded_file($_FILES['slip_setoran']['tmp_name'], '../files/dokumen/'.$_FILES['slip_setoran']['name']);
  move_uploaded_file($_FILES['sertifikat_keterampilan']['tmp_name'], '../files/dokumen/'.$_FILES['sertifikat_keterampilan']['name']);
  move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../images/profil/'.$_FILES['pas_foto']['name']);
  
  
  if($_SESSION['jabatan'] == "daftar_ulang" ){
	 
 echo " <script type='text/javascript'>alert('Data Daftar KKN Berhasil Di Tambah'); location.href=\"../admin/daftar_kkn.php\";</script>";
	  
  }else if($_SESSION['jabatan'] == "Staff"){

 echo " <script type='text/javascript'>alert('Data Daftar KKN Berhasil Di Tambah'); location.href=\"../staff/daftar_kkn.php\";</script>";
	  
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
  <meta name="keyword" content="Dashboard, Bootstrap, daftar_ulang, Template, Theme, Responsive, Fluid, Retina">
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
    Template URL: https://templatemag.com/dashio-bootstrap-daftar_ulang-template/
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
        <h3><i class="fa fa-angle-right"></i> Tambah Daftar KKN </h3>
        <div class="row mt">
          <!--  Form -->
          
          <?php include ('../data/data_input/input_daftar_kkn.php'); ?>
          
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
