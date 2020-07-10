<?php require_once('../../Connections/datalp2m.php'); ?>



<?php
if(isset($_POST['id']))
{
	$output='';
	$sql="SELECT * from tb_pengumpulan_laporan where id_pengumpulan='".$_POST['id']."'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
    $kabupaten = $row['kabupaten'];
    $kecamatan = $row['kecamatan'];
    $nama_desa = $row['nama_desa'];

    if($kabupaten=="t"){
      $kabupaten = "Tapin";
    }else if($kabupaten=="b"){
      $kabupaten = "Banjar";
    }else if($kabupaten=="hsu"){
      $kabupaten = "Hulu Sungai Utara";
    }else{
      $kabupaten = "Kabupaten Tidak Terdaftar";
    }

    if($kecamatan=="cls"){
      $kecamatan = "Candi Laras Selatan";
    }else if($kecamatan=="dp"){
      $kecamatan = "Danau Panggang";
    }else if($kecamatan=="p"){
      $kecamatan = "Paramasan";
    }else if($kecamatan=="tt"){
      $kecamatan = "Tapin Tengah";
    }else if($kecamatan=="ts"){
      $kecamatan = "Tapin Selatan";
    }else{
      $kecamatan = "Kecamatan Tidak Terdaftar";
    }

    if($nama_desa=="s"){
      $nama_desa = "Suput";
    }else if($nama_desa=="h"){
      $nama_desa = "Haruai";
    }else if($nama_desa=="n"){
      $nama_desa = "Nawin";
    }else if($nama_desa=="sm"){
      $nama_desa = "Sungai Miai";
    }else{
      $nama_desa = "Desa Tidak Terdaftar";
    }


		$output.='
		<div class="modal-header">
			<h1 class="centered"> Detail Data KKN</h1>
		</div>
		<div class="modal-body">
			 <table width="100%" border="0">
 
  <tr>
    <td width="24%"><div align="left">Email</div></td>
    <td width="2%"><div align="left"> : </div></td>
    <td width="29%"><div align="left">"'.$row['email'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Kabupaten</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$kabupaten.'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Kecamatan</div></td>
        <td><div align="left"> : </div></td>
    <td><div align="left">"'. $kecamatan.'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nama Desa</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$nama_desa.'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Laporan Program Kerja</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['laporan_program_kerja'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Laporan KKN (Keseluruhan)</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['laporan_kkn'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
</table>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
		</div>';
	}
	echo $output;
}
?>