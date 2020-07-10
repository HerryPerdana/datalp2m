 <?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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


$query_admin_aktif = sprintf("SELECT * FROM tb_admin WHERE id_admin = %s", GetSQLValueString($_SESSION['id_admin'], "int"));
$admin_aktif = mysqli_query( $datalp2m, $query_admin_aktif) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_admin_aktif = mysqli_fetch_assoc($admin_aktif);
$totalRows_admin_aktif = mysqli_num_rows($admin_aktif);


?>
 
 <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
     <div class="sidebar-toggle-box" align="center">
        <img src="../images/logo/header_logo.png"  width="60" height="60">
      </div>
     
      <!--logo start-->
      <a href="dashboard.php" class="logo"><b>ADMIN<br/><span>DATALP2M</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="dahsboard.php#">
              <i class="fa fa-cogs"></i>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">Profil Admin Setting</p>
              </li>
              <li>
                <a href="profil_edit.php">
                  <div class="task-info">
                    <div class="desc">Edit Profil</div>
                  </div>
                  
                </a>
              </li>
              
            </ul>
          </li>
          <!-- settings end -->
         
         
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?php echo $logoutAction ?>"> <i class="fa fa-power-off"></i> &nbsp;Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p>&nbsp </p>
          <p class="centered"><a href="profil.php"><img src="../images/profil/<?php echo $row_admin_aktif['foto']; ?>" class="img-circle" width="100" height="100"></a></p>
          <h5 class="centered"><?php echo $row_admin_aktif['nama_admin']; ?></h5>
          <h5 class="centered">NIP.<?php echo $row_admin_aktif['nip']; ?></h5>
          <li class="mt">
            <a href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-plus"></i>
              <span>Tambah Data</span>
              </a>
            <ul class="sub">
              <!--<li><a href="penelitian.php">Penelitian</a></li> --->
              <li><a href="dokumen_tambah.php">Dokumen</a></li>
              <li><a href="berita_tambah.php">Berita</a></li>
               <li><a href="agenda_tambah.php">Agenda</a></li>
               <li><a href="admin_tambah.php">Admin & Staff</a></li>
               <li><a href="daftar_ulang_tambah.php">Daftar KKN</a></li>
               <li><a href="laporan_tambah.php">Laporan KKN</a></li>
               <li><a href="info_tambah.php">Info KKN</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder"></i>
              <span>Penelitian & Publikasi</span>
              </a>
            <ul class="sub">
              <!--<li><a href="penelitian.php">Penelitian</a></li> --->
              <li><a href="skpp.php">Surat Keterangan</a></li>
              <li><a href="srpp.php">Surat Resmi</a></li>
              <li><a href="stpp.php">Surat Tugas</a></li>
              <li><a href="hppp.php">Hasil Penelitian</a></li>
              <li><a href="btlpp.php">Buku Terbitan LP2M</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder"></i>
              <span>Pengabdian Masyarakat</span>
              </a>
            <ul class="sub">
              <!--<li><a href="penelitian.php">Penelitian</a></li> --->
              <li><a href="skpm.php">Surat Keterangan</a></li>
              <li><a href="srpm.php">Surat Resmi</a></li>
              <li><a href="stpm.php">Surat Tugas</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder"></i>
              <span>Studi Gender & Anak</span>
              </a>
            <ul class="sub">
              <!--<li><a href="penelitian.php">Penelitian</a></li> --->
              <li><a href="skga.php">Surat Keterangan</a></li>
              <li><a href="srga.php">Surat Resmi</a></li>
               <li><a href="stga.php">Surat Tugas</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-folder"></i>
              <span>Kuliah Kerja Nyata</span>
              </a>
            <ul class="sub">
              <!--<li><a href="penelitian.php">Penelitian</a></li> --->
              <li><a href="daftar_kkn.php">Daftar</a></li>
              <li><a href="laporan_kkn.php">Laporan</a></li>
              <li><a href="info.php">Info</a></li>
            </ul>
          </li>
          
          <li>
            <a href="berita.php">
              <i class="fa fa-archive"></i>
              <span>Berita</span>
              </a>
          </li>
          
           <li>
            <a href="agenda.php">
              <i class="fa fa-calendar"></i>
              <span>Agenda</span>
              </a>
          </li>

           <li>
            <a href="user_profil.php">
              <i class="fa fa-laptop"></i>
              <span>Edit Website Profil</span>
              </a>
          </li>
          
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    