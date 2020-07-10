<?php require_once('../../Connections/datalp2m.php'); ?>
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

if (!isset($_SESSION)) {
  session_start();
    $colname_dokumen = "-1";
if (isset($_GET['id_dokumen'])) {
  $colname_dokumen = $_GET['id_dokumen'];
}
$hapus__query = sprintf("SELECT * FROM tb_dokumen WHERE id_dokumen = %s", GetSQLValueString($colname_dokumen, "int"));
   
  $hapus = mysqli_query( $datalp2m, $hapus__query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  $mu = mysqli_fetch_assoc($hapus);
  
  $_SESSION['tipe'] = $mu['tipe'] ;
	  $_SESSION['unit'] = $mu['unit'] ;
	  $_SESSION['lampiran'] = $mu['lampiran'] ;
}

    if (isset($_GET['filename'])) {
    $filename    = $_GET['filename'];

    $back_dir    ="../../files/dokumen/";
    $file = $back_dir.$_GET['filename'];
     
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: private');
            header('Pragma: private');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            
            exit;
        } 
        else {
		
		if($_SESSION['jabatan'] == "Admin" ){
	  if($_SESSION['tipe'] == "sk" && $_SESSION['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/skpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/srpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/stpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "sk" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/skpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/srpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/stpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "sk" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/skga.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/srga.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../admin/stga.php\";</script>";
	  }
  }else if($_SESSION['jabatan'] == "Staff"){
if($_POST['tipe'] == "sk" && $_POST['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/skpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/srpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "pp"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/stpp.php\";</script>";
	  }else if($_SESSION['tipe'] == "sk" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/skpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/srpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "pm"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/stpm.php\";</script>";
	  }else if($_SESSION['tipe'] == "sk" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/skga.php\";</script>";
	  }else if($_SESSION['tipe'] == "sr" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/srga.php\";</script>";
	  }else if($_SESSION['tipe'] == "st" && $_SESSION['unit'] == "ga"  ){
 echo " <script type='text/javascript'>alert('File Tidak Ada / Tidak Ditemukan'); location.href=\"../../staff/stga.php\";</script>";
	  }
  }
		
		
		
		}
    }
?>
