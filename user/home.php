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

$maxRows_berita = 6;
$pageNum_berita = 0;
if (isset($_GET['pageNum_berita'])) {
  $pageNum_berita = (isset($_GET['pageNum_berita']))?$_GET['pageNum_berita']:0;
}
$startRow_berita = $pageNum_berita * $maxRows_berita;

mysqli_select_db( $datalp2m, $database_datalp2m);
$query_berita = "SELECT * FROM tb_berita ORDER BY id_berita DESC";
$query_limit_berita = sprintf("%s LIMIT %d, %d", $query_berita, $startRow_berita, $maxRows_berita);
$berita = mysqli_query( $datalp2m, $query_limit_berita) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_berita = mysqli_fetch_assoc($berita);

if (isset($_GET['totalRows_berita'])) {
  $totalRows_berita = $_GET['totalRows_berita'];
} else {
  $all_berita = mysqli_query($GLOBALS["___mysqli_ston"], $query_berita);
  $totalRows_berita = mysqli_num_rows($all_berita);
}
$totalPages_berita = ceil($totalRows_berita/$maxRows_berita)-1;

$queryString_berita = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_berita") == false && 
        stristr($param, "totalRows_berita") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_berita = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_berita = sprintf("&totalRows_berita=%d%s", $totalRows_berita, $queryString_berita);
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
	<section class="home-banner-area relative" >
     <img class="img-fluid" src="../images/2.png" alt="">
		<div class="overlay overlay-bg"></div>
       
		
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start property Area -->
	<section class="property-area section-gap relative" id="property">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Pusat Data Lp2m UIN Antasari</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="../images/logo/metode-penelitian.jpg" alt="">
							
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-center">
								<h4>Pusat Penelitian & Penerbitan</h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p><a href="skpp.php">Surat Keterangan</a></p>
									<p><a href="srpp.php">Surat Resmi</a></p>
									<p><a href="stpp.php">Surat Tugas</a></p>
								</div>
							</div>
                            
						</div>
					</div>
				</div>
                
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="../images/logo/pengabdian.jpg" alt="">
							
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-center">
								<h4>Pusat Pengabdian Masyarakat</h4>
								
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p><a href="skpm.php">Surat Keterangan</a></p>
									<p><a href="srpm.php">Surat Resmi</a></p>
									<p><a href="stpm.php">Surat Tugas</a></p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="../images/logo/genderdananak.jpg" alt="">
							
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-center">
								<h4>Pusat Studi Gender & Anak</h4>
							</div>
							<div class="middle">
								<div class="d-flex justify-content-start">
									<p><a href="skga.php">Surat Keterangan</a></p>
									<p><a href="srga.php">Surat Resmi</a></p>
									<p><a href="stga.php">Surat Tugas</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End property Area -->




	<!-- Start testomial Area -->
	<section class="testomial-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>Berita Terbaru LP2M</h1>
					<p>
						Berita terbaru dari lp2m UIN Antasari
					</p>
				</div>
			</div>
            
            
			<div class="row">
				<div class="active-testimonial-carusel">
                 <?php do { ?>
					<div class="single-testimonial item">
						<img class="mx-auto" src="../images/berita/<?php echo $row_berita['gambar']; ?>" alt="" height="200" width="200">
                        <p>&nbsp;</p>
                        <div class="thumb">
						<h4><a href="berita_detail.php?id_berita=<?php echo $row_berita['id_berita']; ?>"><?php echo $row_berita['judul']; ?></a></h4>
                        </div>
						<p class="desc" align="justify">
						&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_berita['isi']= substr($row_berita['isi'],0,200); ?>
						</p>
                        
                        <div class="meta-bottom d-flex">
							<p><span class="lnr lnr-calendar-full"></span><?php echo date ('d F Y', strtotime($row_berita['tanggal'])); ?></p>
						</div>
					</div>
            <?php } while ($row_berita = mysqli_fetch_assoc($berita)); ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End testomial Area -->

	<!-- Start blog Area -->
	<section class="blog-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>LP2M UIN ANTASARI</h1>
				
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 single-blog">
					<div class="thumb">
						<a href="profil.php"><img class="img-fluid" src="../images/logo/logo1.jpg" alt=""><h4 align="center">Profil</h4></a>
					</div>
					
					<div class="text-wrap">
						
					</div>
				</div>
                
				<div class="col-lg-6 col-md-6 col-sm-12 single-blog">
					<div class="thumb">
						<a href="agenda.php"><img class="img-fluid" src="../images/logo/agenda.jpg" alt=""><h4 align="center">Agenda</h4></a>
					</div>
					
					<div class="text-wrap">
						
					</div>
				
				</div>
				
			</div>
		</div>
	</section>
	<!-- End blog Area -->


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