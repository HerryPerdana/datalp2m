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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "pengumpulan_laporan")) {
  $insertSQL = sprintf("INSERT INTO tb_pengumpulan_laporan (email, nama_desa, kecamatan, kabupaten, laporan_program_kerja, laporan_kkn) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['nama_desa'], "text"),
                       GetSQLValueString($_POST['kecamatan'], "text"),
                       GetSQLValueString($_POST['kabupaten'], "text"),
                       GetSQLValueString($_FILES['laporan_program_kerja']['name'], "text"),
                       GetSQLValueString($_FILES['laporan_kkn']['name'], "text"));
             
            

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $insertSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  
  move_uploaded_file($_FILES['laporan_program_kerja']['tmp_name'], '../files/dokumen/'.$_FILES['laporan_program_kerja']['name']);
  move_uploaded_file($_FILES['laporan_kkn']['tmp_name'], '../files/dokumen/'.$_FILES['laporan_kkn']['name']);
  
  
   
 echo " <script type='text/javascript'>alert('Data Laporan KKN Berhasil Di Tambah'); location.href=\"laporan_kkn.php\";</script>";
    
  
}

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_stpm = "SELECT status_laporan FROM tb_status WHERE id_status='1'";
$stpm = mysqli_query( $datalp2m, $query_stpm) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_stpm = mysqli_fetch_assoc($stpm);
$totalRows_stpm = mysqli_num_rows($stpm);

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="../images/logo/header_logo.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>DataLp2m</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	 <link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="../css/user/nice-select.css">
	<link rel="stylesheet" href="../css/user/ion.rangeSlider.css" />
	<link rel="stylesheet" href="../css/user/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="../css/user/bootstrap.css">
	<link rel="stylesheet" href="../css/user/owl.carousel.css">
	<link rel="stylesheet" href="../css/user/main.css">

   <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datetimepicker/datertimepicker.css" />

 <!-- Custom styles for this template -->
  <link href="../css/admin/style.css" rel="stylesheet">
  <link href="../css/admin/style-responsive.css" rel="stylesheet">

</head>

<body>

<?php 
$status = $row_stpm['status_laporan'];
  if ($status =="Off"){
echo " <script type='text/javascript'>alert('Maaf Pengumpulan Laporan Telah Di Tutup'); window.history.back(); </script>";
  }else{ 
 ?>


<?php include('header.php'); ?>


	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
     <img class="img-fluid" src="../images/header-bg2.png" alt="">
		<div class="overlay overlay-bg"> <p>&nbsp;</p><br/>
        								<p>&nbsp;</p><br/>
                                        <p>&nbsp;</p>
        									<h1 align="center"><font color="#FFFFFF">Pengumpulan Laporan KKN Mahasiswa</font></h1></div>
	</section>
	<!-- End banner Area -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
        <h3><i class="fa fa-angle-right"></i> Form Pengumpulan Laporan KKN </h3>
        <div class="row mt">
        <?php include('../data/data_input/input_pengumpulan_laporan.php'); ?>
      </div>
	</section>
	<!-- End Sample Area -->




<?php include('footer.php');?>


	<script src="../js/user/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="../js/user/vendor/bootstrap.min.js"></script>
	<script src="../js/user/jquery.ajaxchimp.min.js"></script>
	<script src="../js/user/jquery.nice-select.min.js"></script>
	<script src="../js/user/jquery.sticky.js"></script>
	<script src="../js/user/ion.rangeSlider.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../js/user/jquery.magnific-popup.min.js"></script>
	<script src="../js/user/owl.carousel.min.js"></script>
	<script src="../js/user/main.js"></script>
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
<?php } ?>
</body>

</html>
