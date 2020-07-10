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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_daftar_ulang SET status=%s WHERE id_daftar_ulang=%s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id_daftar_ulang'], "int"));

      

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $updateSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

$colname_Recordset1 = "-1";
if (isset($_GET['id_daftar_ulang'])) {
  $colname_Recordset1 = $_GET['id_daftar_ulang'];
}

  $updateGoTo = "daftar_kkn.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}



$baris = 0;

if (isset($_GET['baris'])==0) {
	$baris = 5;
}else{
	$baris=$_GET['baris'];
	}

$maxRows_daftar_ulang = $baris;		


	
$pageNum_daftar_ulang = 0;
if (isset($_GET['pageNum_daftar_ulang'])) {
  $pageNum_daftar_ulang =  (isset($_GET['pageNum_daftar_ulang']))?$_GET['pageNum_daftar_ulang']:0;
}
$startRow_daftar_ulang = $pageNum_daftar_ulang * $maxRows_daftar_ulang;



mysqli_select_db( $datalp2m, $database_datalp2m);

$query_daftar_ulang = "SELECT * FROM tb_daftar_ulang ORDER BY id_daftar_ulang ASC";


$query_limit_daftar_ulang = sprintf("%s LIMIT %d, %d", $query_daftar_ulang, $startRow_daftar_ulang, $maxRows_daftar_ulang);

$daftar_ulang = mysqli_query( $datalp2m, $query_limit_daftar_ulang) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_daftar_ulang = mysqli_fetch_assoc($daftar_ulang);

if (isset($_GET['totalRows_daftar_ulang'])) {
  $totalRows_daftar_ulang = $_GET['totalRows_daftar_ulang'];
} else {
  $all_daftar_ulang = mysqli_query($GLOBALS["___mysqli_ston"], $query_daftar_ulang);
  $totalRows_daftar_ulang = mysqli_num_rows($all_daftar_ulang);
}
$totalPages_daftar_ulang = ceil($totalRows_daftar_ulang/$maxRows_daftar_ulang)-1;

$queryString_daftar_ulang = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_daftar_ulang") == false && 
        stristr($param, "totalRows_daftar_ulang") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_daftar_ulang = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_daftar_ulang = sprintf("&totalRows_daftar_ulang=%d%s", $totalRows_daftar_ulang, $queryString_daftar_ulang);

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
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
   
<!--   **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      <p>&nbsp;</p>
        <h3><i class="fa fa-angle-right"></i> Data Daftar KKN </h3>
        <div class="row mb">
        <?php include('../data/table_data/table_data_daftar_kkn.php'); ?>

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

  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>

   <!--script for this page-->
  <script type="text/javascript">
  

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
 
 

</body>

</html>
<?php
((mysqli_free_result($daftar_ulang) || (is_object($daftar_ulang) && (get_class($daftar_ulang) == "mysqli_result"))) ? true : false);
?>
