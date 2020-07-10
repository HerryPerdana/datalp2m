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
		$query_dokumen = "SELECT * FROM tb_dokumen WHERE unit like '%".$cari."%' OR nama_dokumen like '%".$cari."%'OR tipe like '%".$cari."%' ORDER BY id_dokumen DESC";				
	}else{
$query_dokumen = "SELECT * FROM tb_dokumen ORDER BY id_dokumen DESC";

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
        

          <!-- page start-->
          <div class="content-panel">
          
     

<div class="goleft">
<table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
  <tr>
    
    <td align="left" width="5%" > &nbsp;&nbsp;&nbsp;&nbsp;Tampilkan </td>
    <td align="left" width="5%" ><form method="get">
  <select name="baris" onchange='if(this.value != 0) { this.form.submit(); }' class="span11">
  								<option value="2"><?php echo  $maxRows_dokumen ?></option>
                                <option value="5">5</option>
                                <option value="10" >10</option>
                                <option value="25">25</option>
                                <option value="50" >50</option>
                                <option value="100">100</option>
                              </select></form></td>
                               <td align="left" width="4%"> Record</td>
                               
                               <td align="right">       <div id="search" class="goright">
 <form method="get">
  <input type="text" name="cari" placeholder="Cari Dokumen"/>
  <button type="submit" class="tip-bottom" title="Search" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1"><i class="fa fa-glass"></i></button></form>
</div></td>
  </tr>
  <tr>
  <td align="left" width="3%"><a href="dokumen_tambah.php" class="btn btn-primary" ><span class="fa fa-plus"></span> Tambah</a>  
    </td>
  
  </tr>
</table>

      <p>&nbsp;</p>    
</div>

          
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" >
                <thead>
                  <tr>
                    <th class=" centered"width="5%">No</th>
                    <th class=" centered" width="25%">Nama Dokumen</th>
                    <th class=" centered" width="15%">Tipe Dokumen</th>
                    <th class=" centered" width="30%">Unit</th>
                    <th class=" centered" width="25%">Action</th>
                  </tr>
                </thead>
                  <?php 
			   $page = $pageNum_dokumen;
  $no = $page  * $maxRows_dokumen + 1 ;
			  
			   do { ?>
                <tbody>
                  <tr>
                    <td class="center hidden-phone"><?php echo $no++; ?></td>
                    <td class="center hidden-phone"><?php echo $row_dokumen['nama_dokumen']; ?></td>
                    <td class="center hidden-phone"><?php echo $row_dokumen['tipe']; ?></td>
                    <td class="center hidden-phone"><?php echo $row_dokumen['unit']; ?></td>
                     <td class="center hidden-phone"><a href="dokumen_edit.php?id_dokumen=<?php echo $row_dokumen['id_dokumen'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="dokumen_hapus.php?id_dokumen=<?php echo $row_dokumen['id_dokumen'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a>  <a href="../files/dokumen/<?php echo $row_dokumen['lampiran'];?>" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
                  </tr>
                </tbody>
                 <?php  } while ($row_dokumen = mysqli_fetch_assoc($dokumen)); ?>
              </table>
            </div>
            
             <div class=" pager "> 
				<ul>

        <!-- LINK FIRST AND PREV -->
        <?php
        if($pageNum_dokumen == 0){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($pageNum_dokumen > 0)? $pageNum_dokumen - 1 : 0;
        ?>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, 0, $queryString_dokumen); ?>">First</a></li>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, max(0, $pageNum_dokumen - 1), $queryString_dokumen); ?>">&laquo;</a></li>
        <?php
        }
        ?>
       
       
       <!-- LINK NUMBER -->
        <?php
		
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number =($pageNum_dokumen > $jumlah_number)? $pageNum_dokumen - $jumlah_number : 0;// Untuk awal link number
        $end_number = ($pageNum_dokumen < ($totalPages_dokumen - $jumlah_number))? $pageNum_dokumen + $jumlah_number : $totalPages_dokumen; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($pageNum_dokumen  == $i)? ' class="paginate_active"' : '';
		  $nomor = $i;
		 
        ?>
          <li<?php echo $link_active; ?>><a href="<?php printf("%s?pageNum_dokumen=%d%s",  $currentPage, $nomor , $queryString_dokumen);  ?>"><?php echo $i+1; ?></a></li>

            <?php
			
			
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($pageNum_dokumen == $totalPages_dokumen){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
        ?>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, min($totalPages_dokumen, $pageNum_dokumen + 1), $queryString_dokumen); ?>">&raquo;</a></li>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, $totalPages_dokumen, $queryString_dokumen); ?>">Last</a></li>
        <?php
        }
        ?>
        
        </ul>
       <!-- Paging end here --> 
        
        
        <!-- convert zone
<table width="15%" border="0" align="left" cellpadding="4" cellspacing="4">
  <tr>
    <td align="center"><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></td>
    <td align="center"><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></td>
  </tr>
</table> -->

</div>
            
            
          </div>
          <!-- page end-->
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
