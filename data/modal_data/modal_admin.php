<?php require_once('../../Connections/datalp2m.php'); ?>



<?php
if(isset($_POST['id']))
{
	$output='';
	$sql="SELECT * from tb_admin where id_admin='".$_POST['id']."'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$output.='
		<div class="modal-header">
			<h1 class="centered"> Detail Admin</h1>
		</div>
		<div class="modal-body">
			 <table width="100%" border="0">
      <tr> 
      <td width="43%" rowspan="15"><img src="../images/profil/'.$row['foto'].'" widht="300px" height="300px"></td>
      <td width="2%" rowspan="15"></td>
      </tr>
  <tr>
    <td width="24%"><div align="left">NIP</div></td>
    <td width="2%"><div align="left"> : </div></td>
    <td width="29%"><div align="left">"'.$row['nip'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Nama</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['nama_admin'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Alamat</div></td>
        <td><div align="left"> : </div></td>
    <td><div align="left">"'. $row['alamat_admin'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">No. Handphone</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['cp'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Status</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['jabatan'].'"</div></td>
  </tr>
 
  <tr>
    <td><div align="left">Username</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'. $row['username'].'"</div></td>
  </tr>
  <tr>
    <td><div align="left">Password</div></td>
    <td><div align="left"> : </div></td>
    <td><div align="left">"'.$row['password'].'"</div></td>
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