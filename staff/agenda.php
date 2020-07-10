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


	
$maxRows_agenda = $baris;
$pageNum_agenda = 0;
if (isset($_GET['pageNum_agenda'])) {
  $pageNum_agenda =  (isset($_GET['pageNum_agenda']))?$_GET['pageNum_agenda']:0;
}
$startRow_agenda = $pageNum_agenda * $maxRows_agenda;


mysqli_select_db( $datalp2m, $database_datalp2m);
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$query_agenda = "SELECT * FROM tb_agenda WHERE nama_agenda like '%".$cari."%' OR penyelenggara like '%".$cari."%'OR penanggalan like '%".$cari."%' ORDER BY id_agenda DESC";				
	}else{
$query_agenda = "SELECT * FROM tb_agenda ORDER BY id_agenda DESC";

}

$query_limit_agenda = sprintf("%s LIMIT %d, %d", $query_agenda, $startRow_agenda, $maxRows_agenda);

$agenda = mysqli_query( $datalp2m, $query_limit_agenda) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_agenda = mysqli_fetch_assoc($agenda);

if (isset($_GET['totalRows_agenda'])) {
  $totalRows_agenda = $_GET['totalRows_agenda'];
} else {
  $all_agenda = mysqli_query($GLOBALS["___mysqli_ston"], $query_agenda);
  $totalRows_agenda = mysqli_num_rows($all_agenda);
}
$totalPages_agenda = ceil($totalRows_agenda/$maxRows_agenda)-1;

$queryString_agenda = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_agenda") == false && 
        stristr($param, "totalRows_agenda") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_agenda = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_agenda = sprintf("&totalRows_agenda=%d%s", $totalRows_agenda, $queryString_agenda);

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
        <h3><i class="fa fa-angle-right"></i> AGENDA  </h3>
        <div class="row mb">
        <?php include('../data/table_data/table_data_agenda.php'); ?>

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
((mysqli_free_result($agenda) || (is_object($agenda) && (get_class($agenda) == "mysqli_result"))) ? true : false);
?>
