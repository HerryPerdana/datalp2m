<?php require_once('../../Connections/datalp2m.php'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Daftar_Laporan_KKN.xls");

$query_pengumpulan_laporan = "SELECT * FROM tb_pengumpulan_laporan ORDER BY id_pengumpulan DESC";
$pengumpulan_laporan = mysqli_query( $datalp2m, $query_pengumpulan_laporan) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_pengumpulan_laporan = mysqli_fetch_assoc($pengumpulan_laporan);
$totalRows_pengumpulan_laporan = mysqli_num_rows($pengumpulan_laporan);


?>

<table class="table table-bordered table-striped table-condensed" border="1">
                  <thead>
                    <tr align="center">
                    <strong>
                      <th>No</th>
                      <th>Email</th>
                      <th>Nama Desa</th>
                      <th>Kecamatan</th>
                      <th>Kabupaten</th>
                    </strong>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php
                  	$no = 1;
                  	Do {
                  	 ?>
                    <tr  align="center">
                    <td><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $row_pengumpulan_laporan['email']; ?></td>
                    <td class="text-center"><?php 
                          if( $row_pengumpulan_laporan['nama_desa'] == "s"){
                            echo "Suput";
                          }else if( $row_pengumpulan_laporan['nama_desa'] == "h"){
                            echo "Haruai";
                          }else if( $row_pengumpulan_laporan['nama_desa'] == "n"){
                            echo "Nawin";
                          }else if( $row_pengumpulan_laporan['nama_desa'] == "sm"){
                            echo "Sungai Miai";
                          }else{
                            echo "Desa Tidak Terdaftar";
                          }


                     ?></td></td>
                    <td class="text-center"><?php 
                          if( $row_pengumpulan_laporan['kecamatan'] == "cls"){
                            echo "Candi Laras Selatan";
                          }else if( $row_pengumpulan_laporan['kecamatan'] == "dp"){
                            echo "Danau Panggang";
                          }else if( $row_pengumpulan_laporan['kecamatan'] == "p"){
                            echo "Paramasan";
                          }else if( $row_pengumpulan_laporan['kecamatan'] == "tt"){
                            echo "Tapin Tengah";
                          }else if( $row_pengumpulan_laporan['kecamatan'] == "ts"){
                            echo "Tapin Selatan";
                          }else{
                            echo "Kecamatan Tidak Terdaftar";
                          }


                     ?></td>
                    <td class="text-center"><?php 
                          if( $row_pengumpulan_laporan['kabupaten'] == "t"){
                            echo "Tapin";
                          }else if( $row_pengumpulan_laporan['kabupaten'] == "b"){
                            echo "Banjar";
                          }else if( $row_pengumpulan_laporan['kabupaten'] == "hsu"){
                            echo "Hulu Sungai Utara";
                          
                          }else{
                            echo "Kabupaten Tidak Terdaftar";
                          }

                     ?></td>
                    </tr>
                <?php  } while ($row_pengumpulan_laporan = mysqli_fetch_assoc($pengumpulan_laporan)); ?>
                  </tbody>
                </table>
