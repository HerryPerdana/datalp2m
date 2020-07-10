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
  
   $colname_agenda = "-1";
if (isset($_GET['id_agenda'])) {
  $colname_agenda = $_GET['id_agenda'];
}
$hapus__query = sprintf("SELECT * FROM tb_agenda WHERE id_agenda = %s", GetSQLValueString($colname_agenda, "int"));
   
  $hapus = mysqli_query( $datalp2m, $hapus__query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  $mu = mysqli_fetch_assoc($hapus);
  
	  $_SESSION['lampiran'] = $mu['lampiran'] ;
 
  
}

if ((isset($_GET['id_agenda'])) && ($_GET['id_agenda'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_agenda WHERE id_agenda=%s",
					   GetSQLValueString($_GET['id_agenda'], "int"));

  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $deleteSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

 unlink("../../files/agenda/".$_SESSION['lampiran']);
 
 if($_SESSION['jabatan'] == "Admin" ){

 echo " <script type='text/javascript'>alert('Data Berhasil Di Hapus'); location.href=\"../../admin/agenda.php\";</script>";
	  
  }else if($_SESSION['jabatan'] == "Staff"){

 echo " <script type='text/javascript'>alert('Data Berhasil Di Hapus'); location.href=\"../../staff/agenda.php\";</script>";
	  
  }

}
?>
