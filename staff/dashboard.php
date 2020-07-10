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

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_stpp = "SELECT * FROM tb_dokumen WHERE tipe='st' AND unit='pp'";
$stpp = mysqli_query( $datalp2m, $query_stpp) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_stpp = mysqli_fetch_assoc($stpp);
$totalRows_stpp = mysqli_num_rows($stpp);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_srpp = "SELECT * FROM tb_dokumen WHERE tipe='sr' AND unit='pp'";
$srpp = mysqli_query( $datalp2m, $query_srpp) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_srpp = mysqli_fetch_assoc($srpp);
$totalRows_srpp = mysqli_num_rows($srpp);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_skpp = "SELECT * FROM tb_dokumen WHERE tipe='sk' AND unit='pp'";
$skpp = mysqli_query( $datalp2m, $query_skpp) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_skpp = mysqli_fetch_assoc($skpp);
$totalRows_skpp = mysqli_num_rows($skpp);



mysqli_select_db( $datalp2m, $database_datalp2m);
$query_stpm = "SELECT * FROM tb_dokumen WHERE tipe='st' AND unit='pm'";
$stpm = mysqli_query( $datalp2m, $query_stpm) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_stpm = mysqli_fetch_assoc($stpm);
$totalRows_stpm = mysqli_num_rows($stpm);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_srpm = "SELECT * FROM tb_dokumen WHERE tipe='sr' AND unit='pm'";
$srpm = mysqli_query( $datalp2m, $query_srpm) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_srpm = mysqli_fetch_assoc($srpm);
$totalRows_srpm = mysqli_num_rows($srpm);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_skpm = "SELECT * FROM tb_dokumen WHERE tipe='sk' AND unit='pm'";
$skpm = mysqli_query( $datalp2m, $query_skpm) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_skpm = mysqli_fetch_assoc($skpm);
$totalRows_skpm = mysqli_num_rows($skpm);



mysqli_select_db( $datalp2m, $database_datalp2m);
$query_stga = "SELECT * FROM tb_dokumen WHERE tipe='st' AND unit='ga'";
$stga = mysqli_query( $datalp2m, $query_stga) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_stga = mysqli_fetch_assoc($stga);
$totalRows_stga = mysqli_num_rows($stga);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_srga = "SELECT * FROM tb_dokumen WHERE tipe='sr' AND unit='ga'";
$srga = mysqli_query( $datalp2m, $query_srga) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_srga = mysqli_fetch_assoc($srga);
$totalRows_srga = mysqli_num_rows($srga);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_skga = "SELECT * FROM tb_dokumen WHERE tipe='sk' AND unit='ga'";
$skga = mysqli_query( $datalp2m, $query_skga) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_skga = mysqli_fetch_assoc($skga);
$totalRows_skga = mysqli_num_rows($skga);

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_status = "SELECT * FROM tb_status WHERE id_status='1'";
$status = mysqli_query( $datalp2m, $query_status) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_status = mysqli_fetch_assoc($status);
$totalRows_status = mysqli_num_rows($status);





$query_admin = sprintf("SELECT * FROM tb_admin WHERE id_admin = %s", GetSQLValueString($_SESSION['id_admin'], "int"));
$admin = mysqli_query( $datalp2m, $query_admin) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_admin = mysqli_fetch_assoc($admin);
$totalRows_admin = mysqli_num_rows($admin);


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "status_daftar")) {
  $updateSQL = sprintf("UPDATE tb_status SET status_daftar=%s WHERE id_status=%s",
                       GetSQLValueString($_POST['status_daftar'], "text"),
                       GetSQLValueString($_POST['id_status'], "int"));

      

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $updateSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

 echo " <script type='text/javascript'>location.href=\"dashboard.php\";</script>";

}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "status_laporan")) {
  $updateSQL = sprintf("UPDATE tb_status SET status_laporan=%s WHERE id_status=%s",
                       GetSQLValueString($_POST['status_laporan'], "text"),
                       GetSQLValueString($_POST['id_status'], "int"));

      

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $updateSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

 echo " <script type='text/javascript'>location.href=\"dashboard.php\";</script>";

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

  <!-- Favicons -->
  <link href="../images/logo/header_logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/admin/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/admin/style.css" rel="stylesheet">
  <link href="../css/admin/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
   
   
   <?php include ('header.php'); ?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
           
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-6 col-sm-6 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><strong>Status Page Daftar Ulang KKN</strong></h5>
                  </div>
                  
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Status Page <br> Daftar Ulang KKN</h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                     
                      <form method="post" name="status_daftar" id="status_daftar" action="<?php echo $editFormAction; ?>">
                                    <select name="status_daftar" class="form-control" id="status_daftar" onchange='if(this.value != 0) { this.form.submit(); }'>
                                       <option <?php if($row_status['status_daftar'] == 'On') { echo "selected"; }?> value="On" >Page Online</option>
                                        <option <?php if($row_status['status_daftar'] == 'Off') { echo "selected"; }?> value="Off" >Page Offline</option>
                                       
                                    </select>
                                    <input type="hidden" name="MM_update" value="status_daftar">
                          <input type="hidden" name="id_status" value="<?php echo $row_status['id_status']; ?>">
                                  </form>
                    </div>
                  
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->

              <!-- SERVER STATUS PANELS -->
              <div class="col-md-6 col-sm-6 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><strong>Status Page Pengumpulan Laporan KKN</strong></h5>
                  </div>
                  
                    <div class="col-sm-7 col-xs-7 goleft">
                      <h5>Status Page <br> Pengumpulan Laporan KKN</h5>
                    </div>
                    <div class="col-sm-5 col-xs-5">
                     
                      <form method="post" name="status_laporan" id="status_laporan" action="<?php echo $editFormAction; ?>">
                                    <select name="status_laporan" class="form-control" id="status_laporan" onchange='if(this.value != 0) { this.form.submit(); }'>
                                       <option <?php if($row_status['status_laporan'] == 'On') { echo "selected"; }?> value="On" >Page Online</option>
                                        <option <?php if($row_status['status_laporan'] == 'Off') { echo "selected"; }?> value="Off" >Page Offline</option>
                                       
                                    </select>
                                    <input type="hidden" name="MM_update" value="status_laporan">
                          <input type="hidden" name="id_status" value="<?php echo $row_status['id_status']; ?>">
                                  </form>
                    </div>
                  
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->

              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><strong>Pusat Penelitian & Penerbitan</strong></h5>
                  </div>
                  <div class="col-sm-6 col-xs-6 goleft">
                      <h6>Surat Keterangan </h6>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_skpp ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Resmi </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_srpp ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Tugas </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_stpp ?></strong></h5>
                    </div>
                    
                    
                    
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              
               <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><strong>Pusat Pengabdian Masyarakat</strong></h5>
                  </div>
                  <div class="col-sm-6 col-xs-6 goleft">
                      <h6>Surat Keterangan </h6>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_skpm ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Resmi </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_srpm ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Tugas </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_stpm ?></strong></h5>
                    </div>
                    
                    
                    
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              
               <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><strong>Pusat Studi Gender & Anak</strong></h5>
                  </div>
                  <div class="col-sm-6 col-xs-6 goleft">
                      <h6>Surat Keterangan </h6>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_skga ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Resmi </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_srga ?></strong></h5>
                    </div>
                    
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Surat Tugas </h5>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h5>: <strong><?php echo $totalRows_stga ?></strong></h5>
                    </div>
                    
                    
                    
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              
              
              
           
            </div>
          </div>
             
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4>Selamat Datang</h4>
              <img src="../images/profil/<?php echo $row_admin['foto']; ?>" class="img-circle" width="300" height="300">
             
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
              <div class="panel-body">
                <div class="chart">
                  <div class="centered">
                    <strong><?php echo $row_admin['nama_admin']; ?></strong>
                    <br/>
                    <strong>NIP.<?php echo $row_admin['nip']; ?></strong>
                 
                  </div>
                  <br>
                 
              </div>
            </div>
            <!--new earning end-->
           
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
   
  </section>
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
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
 
  
</body>

</html>
<?php
((mysqli_free_result($srpp) || (is_object($srpp) && (get_class($srpp) == "mysqli_result"))) ? true : false);

((mysqli_free_result($skpp) || (is_object($skpp) && (get_class($skpp) == "mysqli_result"))) ? true : false);

((mysqli_free_result($stpp) || (is_object($stpp) && (get_class($stpp) == "mysqli_result"))) ? true : false);
?>
