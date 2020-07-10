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

$maxRows_berita = 1;
$pageNum_berita = 0;
if (isset($_GET['pageNum_berita'])) {
  $pageNum_berita = (isset($_GET['pageNum_berita']))?$_GET['pageNum_berita']:0;
}
$startRow_berita = $pageNum_berita * $maxRows_berita;
$colname_berita = "-1";
if (isset($_GET['id_berita'])) {
  $colname_berita = $_GET['id_berita'];
}
$query_berita = sprintf("SELECT * FROM tb_berita WHERE id_berita = %s", GetSQLValueString($colname_berita, "int"));
$berita = mysqli_query( $datalp2m, $query_berita) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_berita = mysqli_fetch_assoc($berita);
$totalRows_berita = mysqli_num_rows($berita);

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
	<section class="banner-area relative" id="home">
     <img class="img-fluid" src="../images/header-bg2.png" alt="">
		<div class="overlay overlay-bg"> <p>&nbsp;</p><br/>
        								<p>&nbsp;</p><br/>
                                        <p>&nbsp;</p>
        									<h1 align="center"><font color="#FFFFFF">Berita</font></h1></div>
	</section>
	<!-- End banner Area -->

    <!--  Blog Area -->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                            <p>&nbsp </p>
                                <img class="img-fluid centered" src="../images/berita/<?php echo $row_berita['gambar']; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                              
                                <ul class="blog_meta list">
                                   
                                   <li>Di post pada : <br/>
                                           <?php echo date ('d F Y', strtotime($row_berita['tanggal'])); ?>
                                                <i class="fa fa-calendar"></i>
                                        </li>
                                </ul>
                               
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2><?php echo $row_berita['judul']; ?></h2>
                            <p>&nbsp </p>
                            <p class="excert" align="justify">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo html_entity_decode($row_berita['isi']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p>&nbsp;</p>   
                       
                        </div>
                    </div>
                   
                </div>
               
    </section>
    <!--  Blog Area -->



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
((mysqli_free_result($berita) || (is_object($berita) && (get_class($berita) == "mysqli_result"))) ? true : false);
?>
