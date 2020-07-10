8	<!-- Start Header Area -->
	<header class="default-header">
		<div class="menutop-wrap">
			<div class="menu-top container">
				<div class="d-flex justify-content-end align-items-center">
						<MARQUEE align="center" direction="left" height="30" scrollamount="5" width="100%"><?php 
$waktu=gmdate("H:i",time()+8*3600);
$t=explode(":",$waktu); 
$jam=$t[0]; 
$menit=$t[1];

if ($jam >= 00 and $jam < 12 ){ 
if ($menit >00 and $menit<60){ 
$ucapan="Selamat Pagi"; 
} 
}else if ($jam >= 12 and $jam < 15 ){ 
if ($menit >00 and $menit<60){ 
$ucapan="Selamat Siang"; 
} 
}else if ($jam >= 15 and $jam < 18 ){ 
if ($menit >00 and $menit<60){ 
$ucapan="Selamat Sore"; 
} 
}else if ($jam >= 18 and $jam <= 24 ){ 
if ($menit >00 and $menit<60){ 
$ucapan="Selamat Malam"; 
} 
}else { 
$ucapan="Error";

}

//echo “Assalamu’alaikum…”.$ucapan;
//$ucapan.”, Sekarang pukul $waktu WIB”;
echo  "     Assalamu’alaikum…   ".$ucapan." ,Selamat Datang Di Website Pusat Penelitian UIN Antasari, Sekarang pukul ".$waktu." WITA";
?>
</MARQUEE> 
				
				</div>
			</div>
		</div>





		<div class="main-menu">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<p>&nbsp;</p>
                        <table width="100%" border="0">
  							<tr>
    							<td><a href="home.php"><img src="../images/logo/header_logo.png" alt="logo" title="" height="50" width="50" /> </a></td>
 								<td><h4>DATA LP2M <br/> UIN ANTASARI</h4></td>
                                
 							</tr>
						</table>

                        
					</div>
                    
                    
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li><a href="home.php">Home</a></li>
                            <li><a href="profil.php">Profil</a></li>
							
							<li class="menu-has-children"><a href="#">Penelitian & Publikasi</a>
								<ul>
									<li><a href="skpp.php">Surat Keterangan</a></li>
									<li><a href="srpp.php">Surat Resmi</a></li>
                                    <li><a href="stpp.php">Surat Tugas</a></li>
                                    <li><a href="hp.php">Hasil Penelitian</a></li>
                                    <li><a href="btl.php">Buku Terbitan LP2M</a></li>
								</ul>
							</li>
                            
                            <li class="menu-has-children"><a href="#">Pengabdian Masyarakat</a>
								<ul>
									<li><a href="skpm.php">Surat Keterangan</a></li>
									<li><a href="srpm.php">Surat Resmi</a></li>
                                    <li><a href="stpm.php">Surat Tugas</a></li>
								</ul>
							</li>
                            
                            <li class="menu-has-children"><a href="#">Studi Gender & Anak</a>
								<ul>
									<li><a href="skga.php">Surat Keterangan</a></li>
									<li><a href="srga.php">Surat Resmi</a></li>
                                    <li><a href="stga.php">Surat Tugas</a></li>
								</ul>
							</li>
                            
                            
							<li><a href="agenda.php">Agenda</a></li>
                            <li><a href="berita.php">Berita</a></li>
							<li><a href="hubungi.php">Contact Us</a></li>

							<li class="menu-has-children"><a href="#">KKN</a>
								<ul>
									<li><a href="daftar_ulang_kkn.php">Daftar Ulang KKN</a></li>
									<li><a href="daftar_kkn.php">Daftar Mahasiswa KKN</a></li>
									<li><a href="pengumpulan_laporan_kkn.php">Pengumpulan Laporan</a></li>
									<li><a href="laporan_kkn.php">Daftar Laporan</a></li>
									<li><a href="info_kkn.php">Info KKN</a></li>
								</ul>
							</li>
							
						</ul>
					</nav>
					<!--######## #nav-menu-container -->
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Area -->