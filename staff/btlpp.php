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

$currentPage = $_SERVER["PHP_SELF"];

$baris = 0;

if (isset($_GET['baris'])==0) {
	$baris = 5;
}else{
	$baris=$_GET['baris'];
	}

$maxRows_admin = $baris;		


	
$maxRows_dokumen = $baris;
$pageNum_dokumen = 0;
if (isset($_GET['pageNum_dokumen'])) {
  $pageNum_dokumen =  (isset($_GET['pageNum_dokumen']))?$_GET['pageNum_dokumen']:0;
}
$startRow_dokumen = $pageNum_dokumen * $maxRows_dokumen;


mysqli_select_db( $datalp2m, $database_datalp2m);
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query_dokumen = "SELECT * FROM tb_dokumen WHERE unit='pp' AND tipe='btl' AND nama_dokumen like '%".$cari."%' ORDER BY id_dokumen DESC";				
	}else{
$query_dokumen = "SELECT * FROM tb_dokumen WHERE unit='pp' AND tipe='btl' ORDER BY id_dokumen DESC";

}

$query_limit_dokumen = sprintf("%s LIMIT %d, %d", $query_dokumen, $startRow_dokumen, $maxRows_dokumen);

$dokumen = mysqli_query( $datalp2m, $query_limit_dokumen) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_dokumen = mysqli_fetch_assoc($dokumen);

if (isset($_GET['totalRows_dokumen'])) {
  $totalRows_dokumen = $_GET['totalRows_dokumen'];
} else {
  $all_dokumen = mysqli_query($GLOBALS["___mysqli_ston"], $query_dokumen);
  $totalRows_dokumen = mysqli_num_rows($all_dokumen);
}
$totalPages_dokumen = ceil($totalRows_dokumen/$maxRows_dokumen)-1;

$queryString_dokumen = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dokumen") == false && 
        stristr($param, "totalRows_dokumen") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dokumen = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dokumen = sprintf("&totalRows_dokumen=%d%s", $totalRows_dokumen, $queryString_dokumen);

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
  <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../lib/advanced-datatable/css/DT_bootstrap.css" />
  
   <!-- Favicons -->
  <link href="../images/logo/header_logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
 <link rel="stylesheet" type="text/css" href="../css/admin/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
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
   
<!--   **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      <p>&nbsp;</p>
        <h3><i class="fa fa-angle-right"></i> Data Dokumen </h3>
        <div class="row mb">
        <?php include ('../data/table_data/table_data_dokumen.php'); ?>

         
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
   
  </section>
  
  <!-- js placed at the end of the document so the pages load faster -->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
 

</body>

</html>
<?php
((mysqli_free_result($dokumen) || (is_object($dokumen) && (get_class($dokumen) == "mysqli_result"))) ? true : false);
?>
