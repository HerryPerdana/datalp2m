<?php require_once('../../Connections/datalp2m.php'); ?>



<?php
if(isset($_POST['id']))
{
	$output='';
	$sql="SELECT * from tb_daftar_ulang where id_daftar_ulang='".$_POST['id']."'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
    $jk = $row['jk'];
    if($jk=="L"){
      $jk = "Laki - Laki";
    }else{
      $jk = "Perempuan";
    }

		$output.='
		<div class="modal-header">
			<h1 class="centered"> Detail Data KKN</h1>
		</div>
		<div class="modal-body">
			 <table width="100%" border="0">
  <tr> 
      <td width="43%" rowspan="40"><img src="../images/profil/'.$row['pas_foto'].'" widht="300px" height="300px"></td>
      <td width="2%" rowspan="40"></td>
  </tr>
  <tr>
    <td width="24%"><div align="left">NIM</div></td>
    <td width="2%"><div align="left"> : </div></td>
    <td width="29%"><div align="left">"'.$row['nim'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nama</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['nama'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Fakultas</div></td>
        <td><div align="left"> : </div></td>
    <td><div align="left">"'. $row['fakultas'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Jurusan</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['jurusan'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Alamat Domisili</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['alamat_domisili'].'"</div></td>
  </tr>
 
  <tr>
    <td><div align="left">Alamat Asal</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'. $row['alamat_asal'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Kecamatan Asal</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['kecamatan_asal'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Kabupaten Asal</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['kabupaten_asal'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Jenis Kelamin</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$jk.'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Tempat Lahir</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['tempat_lahir'].'"</div></td>
  </tr>
   <tr>
    <td><div align="left">Tanggal Lahir</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.date('d M Y', strtotime($row['tanggal_lahir'])).'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nomor Whatsapp (WA)</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['no_wa'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nama Orang Tua</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['nama_ortu'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nomor Telepon Orang Tua / Wali</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['no_telp_ortu'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Alamat Orang Tua</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['alamat_ortu'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Jumlah Perolehan SKS</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['sks'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">IPK (Minimal 2.0)</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['ipk'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nilai Tes Keterampilan Keagamaan (TKK)</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['tkk'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Organisasi Yang Diikuti</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['organisasi'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Keterampilan Keagamaan Khusus</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['keterampilan_keagamaan'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Scan KTM</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['ktm'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Surat Kesediaan Mengikuti KKN</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['surat_kesediaan'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Surat Izin Orang Tua / Wali / Pasangan</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['surat_izin'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Surat Keterangan Perolehan SKS dan IPK dari Mikwa Fakultas</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['surat_sks_ipk'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Rincian Transkrip</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['rincian_transkrip'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Surat Keterangan Perolehan SKK</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['keterangan_skk'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Slip Setoran Biaya KKN</div></td>
    <td><div align="left"> : </div></td>
     <td><a href="../config/download/download_dokumen.php?filename='.$row['slip_setoran'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
  </tr>
  <tr>
    <td><div align="left">Scan Sertifikat Keterampilan Keagamaan</div></td>
    <td><div align="left"> : </div></td>
    <td><a href="../config/download/download_dokumen.php?filename='.$row['sertifikat_keterampilan'].'" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
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