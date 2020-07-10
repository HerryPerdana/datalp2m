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

$maxRows_agenda = 10;
$pageNum_agenda = 0;
if (isset($_GET['pageNum_agenda'])) {
  $pageNum_agenda = (isset($_GET['pageNum_agenda']))?$_GET['pageNum_agenda']:0;
}
$startRow_agenda = $pageNum_agenda * $maxRows_agenda;

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_agenda = "SELECT * FROM tb_agenda ORDER BY id_agenda ASC";
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
        									<h1 align="center"><font color="#FFFFFF">Agenda</font></h1></div>
	</section>
	<!-- End banner Area -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
	  <div class="container">
			<h3 class="text-heading" align="center">Daftar Agenda</h3>
			<div class="table-responsive">
              <table class="table" id="example">
                    <thead class=" text-dark" align="center">
                   	<th>No</th>
                  		<th>Tanggal</th>
                        <th>Nama</th>
                  		<th>Penyelenggara</th>
                  		<th>Lampiran</th>
                    </thead>
                <tbody class="" align="center">
                    
                <?php 
  $page = $pageNum_agenda;
  $no = $page  * $maxRows_agenda + 1 ; do { ?>
                      <tr>
                      	<td><?php echo $no; ?></td>
                    	<td><?php echo date("d M Y ", strtotime($row_agenda['penanggalan'])); ?></td>
                    	<td><?php echo $row_agenda['nama_agenda']; ?></td>
                    	<td><?php echo $row_agenda['penyelenggara']; ?></td>
                <td><a href="../config/download/download_agenda_user.php?filename=<?php echo $row_agenda['lampiran'];?>&id_agenda=<?php echo $row_agenda['id_agenda']; ?>" class=" fa fa-download"> DOWNLOAD</a></td>
                    
                        
                        
                        
                      </tr>
                      
                      <?php $no++; } while ($row_agenda = mysqli_fetch_assoc($agenda)); ?> 
                                         
                    
  </tbody>
                </table>
               </div>
               
                <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, max(0, $pageNum_agenda - 1), $queryString_agenda); ?>" class="page-link">
                                        <span aria-hidden="true">
                                            <span class="fa fa-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                
                                 <!-- LINK NUMBER -->
        <?php
		
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number =($pageNum_agenda > $jumlah_number)? $pageNum_agenda - $jumlah_number : 0;// Untuk awal link number
        $end_number = ($pageNum_agenda < ($totalPages_agenda - $jumlah_number))? $pageNum_agenda + $jumlah_number : $totalPages_agenda; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($pageNum_agenda  == $i)? ' class="page-item active"' : '';
		  $nomor = $i;
		 
        ?>
          <li  <?php echo $link_active; ?>><a class="page-link" href="<?php printf("%s?pageNum_agenda=%d%s",  $currentPage, $nomor , $queryString_agenda);  ?>" ><?php echo $i+1; ?></a></li>

            <?php
			
			
        }
        ?>
        
                                
                                <li class="page-item">
                                    <a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, min($totalPages_agenda, $pageNum_agenda + 1), $queryString_agenda); ?>" class="page-link">
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
((mysqli_free_result($agenda) || (is_object($agenda) && (get_class($agenda) == "mysqli_result"))) ? true : false);
?>
