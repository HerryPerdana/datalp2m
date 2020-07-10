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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_skpp = 10;
$pageNum_skpp = 0;
if (isset($_GET['pageNum_skpp'])) {
  $pageNum_skpp = (isset($_GET['pageNum_skpp']))?$_GET['pageNum_skpp']:0;
}
$startRow_skpp = $pageNum_skpp * $maxRows_skpp;

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_skpp = "SELECT * FROM tb_dokumen WHERE tipe='sk' AND unit='pm' ORDER BY id_dokumen DESC";
$query_limit_skpp = sprintf("%s LIMIT %d, %d", $query_skpp, $startRow_skpp, $maxRows_skpp);
$skpp = mysqli_query( $datalp2m, $query_limit_skpp) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_skpp = mysqli_fetch_assoc($skpp);

if (isset($_GET['totalRows_skpp'])) {
  $totalRows_skpp = $_GET['totalRows_skpp'];
} else {
  $all_skpp = mysqli_query($GLOBALS["___mysqli_ston"], $query_skpp);
  $totalRows_skpp = mysqli_num_rows($all_skpp);
}
$totalPages_skpp = ceil($totalRows_skpp/$maxRows_skpp)-1;

$queryString_skpp = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_skpp") == false && 
        stristr($param, "totalRows_skpp") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_skpp = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_skpp = sprintf("&totalRows_skpp=%d%s", $totalRows_skpp, $queryString_skpp);
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
</head>

<body>

<?php include('header.php'); ?>


	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
     <img class="img-fluid" src="../images/header-bg2.png" alt="">
		<div class="overlay overlay-bg"> <p>&nbsp;</p><br/>
        								<p>&nbsp;</p><br/>
                                        <p>&nbsp;</p>
        									<h1 align="center"><font color="#FFFFFF">Pusat Pengabdian Masyarakat</font></h1></div>
	</section>
	<!-- End banner Area -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
	  <div class="container">
			<h3 class="text-heading" align="center">Surat Keterangan / Surat Kerja</h3>
			<div class="table-responsive">
              <table class="table" id="example">
                    <thead class=" text-dark" align="center">
                   	<th>No</th>
                        <th>Nama</th>
                  		<th align="center">Lampiran</th>
                    </thead>
                <tbody class="" align="center">
                    
                <?php 
  $page = $pageNum_skpp;
  $no = $page  * $maxRows_skpp + 1 ; do { ?>
                      <tr>
                      	<td><?php echo $no; ?></td>
                    	<td><?php echo $row_skpp['nama_dokumen']; ?></td>
                    	<td align="center"><a href="../config/download/download_dokumen_user.php?filename=<?php echo $row_skpp['lampiran'];?>" class=" fa fa-download"> DOWNLOAD</a></td>
                      </tr>
                      
                      <?php $no++; } while ($row_skpp = mysqli_fetch_assoc($skpp)); ?> 
                                         
                    
  </tbody>
                </table>
               </div>
               
                <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="<?php printf("%s?pageNum_skpp=%d%s", $currentPage, max(0, $pageNum_skpp - 1), $queryString_skpp); ?>" class="page-link">
                                        <span aria-hidden="true">
                                            <span class="fa fa-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                
                                 <!-- LINK NUMBER -->
        <?php
		
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number =($pageNum_skpp > $jumlah_number)? $pageNum_skpp - $jumlah_number : 0;// Untuk awal link number
        $end_number = ($pageNum_skpp < ($totalPages_skpp - $jumlah_number))? $pageNum_skpp + $jumlah_number : $totalPages_skpp; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($pageNum_skpp  == $i)? ' class="page-item active"' : '';
		  $nomor = $i;
		 
        ?>
          <li  <?php echo $link_active; ?>><a class="page-link" href="<?php printf("%s?pageNum_skpp=%d%s",  $currentPage, $nomor , $queryString_skpp);  ?>" ><?php echo $i+1; ?></a></li>

            <?php
			
			
        }
        ?>
        
                                
                                <li class="page-item">
                                    <a href="<?php printf("%s?pageNum_skpp=%d%s", $currentPage, min($totalPages_skpp, $pageNum_skpp + 1), $queryString_skpp); ?>" class="page-link">
                                        <span aria-hidden="true">
                                            <span class="fa fa-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        
             
      </div>
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
</body>

</html>
<?php
((mysqli_free_result($skpp) || (is_object($skpp) && (get_class($skpp) == "mysqli_result"))) ? true : false);
?>
