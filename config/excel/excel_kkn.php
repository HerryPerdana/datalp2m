<?php require_once('../../Connections/datalp2m.php'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Daftar_KKN.xls");

$query_daftar_kkn = "SELECT * FROM tb_daftar_ulang ORDER BY id_daftar_ulang DESC";
$daftar_kkn = mysqli_query( $datalp2m, $query_daftar_kkn) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_daftar_kkn = mysqli_fetch_assoc($daftar_kkn);
$totalRows_daftar_kkn = mysqli_num_rows($daftar_kkn);


?>

<table class="table table-bordered table-striped table-condensed" border="1">
                  <thead>
                    <tr align="center">
                    <strong>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Fakultas</th>
                      <th>Jurusan</th>
                      <th>Alamat Domisili</th>
                      <th>Alamat Asal</th>
                      <th>Kecamatan Asal</th>
                      <th>Kabupaten Asal</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Semester</th>
                      <th>Nomor WA</th>
                      <th>Nama Orang Tua</th>
                      <th>Nomor Telepon Orang Tua</th>
                      <th>Alamat Orang Tua</th>
                      <th>SKS</th>
                      <th>IPK</th>
                      <th>Nilai TKK</th>
                      <th>Organisasi</th>
                      <th>Keterampilan Keagamaan</th>
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
                      <td><?php echo $row_daftar_kkn['nim']; ?></td>
                      <td><?php echo $row_daftar_kkn['nama']; ?></td>
                      <td><?php echo $row_daftar_kkn['email']; ?></td>
                      <td><?php 
                          if( $row_daftar_kkn['fakultas'] == "ftk"){
                            echo "FTK";
                          }else if( $row_daftar_kkn['fakultas'] == "fdk"){
                            echo "FDK";
                          }else if( $row_daftar_kkn['fakultas'] == "fuh"){
                            echo "FUH";
                          }else if( $row_daftar_kkn['fakultas'] == "fs"){
                            echo "FS";
                          }else if( $row_daftar_kkn['fakultas'] == "febi"){
                            echo "FEBI";
                          }else{
                            echo "Fakultas Tidak Terdaftar";
                          }
                     ?></td>
                     <td><?php 
                          if( $row_daftar_kkn['jurusan'] == "hk"){
                            echo "Hukum Keluarga";
                          }else if( $row_daftar_kkn['jurusan'] == "hes"){
                            echo "Hukum Ekonomi Syariah";
                          }else if( $row_daftar_kkn['jurusan'] == "htn"){
                            echo "Hukum Tata Negara";
                          }else if( $row_daftar_kkn['jurusan'] == "es"){
                            echo "Ekonomi Syariah";
                          }else if( $row_daftar_kkn['jurusan'] == "ps"){
                            echo "Perbankan Syariah";
                          }else if( $row_daftar_kkn['jurusan'] == "as"){
                            echo "Asuransi Syariah";
                          }else if( $row_daftar_kkn['jurusan'] == "pa"){
                            echo "Perbandingan Agama";
                          }else if( $row_daftar_kkn['jurusan'] == "th"){
                            echo "Tafsir Hadist";
                          }else if( $row_daftar_kkn['jurusan'] == "pai"){
                            echo "Pendidikan Agama Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "pba"){
                            echo "Pendidikan Bahasa Arab";
                          }else if( $row_daftar_kkn['jurusan'] == "pbi"){
                            echo "Pendidikan Bahasa Inggris";
                          }else if( $row_daftar_kkn['jurusan'] == "pm"){
                            echo "Pendidikan Matematika";
                          }else if( $row_daftar_kkn['jurusan'] == "mpi"){
                            echo "Manajemen Pendidikan Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "bki"){
                            echo "Bimbingan Konseling Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "pgmi"){
                            echo "PGMI";
                          }else if( $row_daftar_kkn['jurusan'] == "piaud"){
                            echo "PIAUD";
                          }else if( $row_daftar_kkn['jurusan'] == "ipii"){
                            echo "Ilmu Perpustakaan dan Informasi Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "pb"){
                            echo "Pendidikan Biologi";
                          }else if( $row_daftar_kkn['jurusan'] == "pk"){
                            echo "Pendidikan Kimia";
                          }else if( $row_daftar_kkn['jurusan'] == "pf"){
                            echo "Pendidikan Fisika";
                          }else if( $row_daftar_kkn['jurusan'] == "pi"){
                            echo "Psikologi Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "md"){
                            echo "Manajemen Dakwah";
                          }else if( $row_daftar_kkn['jurusan'] == "kpi"){
                            echo "Komunikasi dan Penyiaran Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "bpi"){
                            echo "Bimbingan dan Penyuluhan Islam";
                          }else if( $row_daftar_kkn['jurusan'] == "pem"){
                            echo "Perbandingan Mazhab";
                          }else if( $row_daftar_kkn['jurusan'] == "af"){
                            echo "Akidah Filsafat";
                          }else{
                            echo "Jurusan Tidak Terdaftar";
                          }

                     ?></td>
                     <td><?php echo $row_daftar_kkn['alamat_domisili']; ?></td>
                     <td><?php echo $row_daftar_kkn['alamat_asal']; ?></td>
                     <td><?php echo $row_daftar_kkn['kecamatan_asal']; ?></td>
                     <td><?php echo $row_daftar_kkn['kabupaten_asal']; ?></td>
                      <td><?php
                      if ($row_daftar_kkn['jk'] == "L"){
                      	echo "Laki - Laki";
                      }else{
                      	echo "Perempuan";
                      }

                       ?></td>
                      <td><?php echo $row_daftar_kkn['tempat_lahir']; ?></td>
                      <td><?php echo date("d M Y", strtotime($row_daftar_kkn['tanggal_lahir'])); ?></td>
                      <td><?php echo $row_daftar_kkn['semester']; ?></td>
                      <td><?php echo $row_daftar_kkn['no_wa']; ?></td>
                      <td><?php echo $row_daftar_kkn['nama_ortu']; ?></td>
                      <td><?php echo $row_daftar_kkn['no_telp_ortu']; ?></td>
                      <td><?php echo $row_daftar_kkn['alamat_ortu']; ?></td>
                      <td><?php echo $row_daftar_kkn['sks']; ?></td>
                      <td><?php echo $row_daftar_kkn['ipk']; ?></td>
                      <td><?php echo $row_daftar_kkn['tkk']; ?></td>
                      <td><?php echo $row_daftar_kkn['organisasi']; ?></td>
                      <td><?php echo $row_daftar_kkn['keterampilan_keagamaan']; ?></td>

                    </tr>
                <?php  } while ($row_daftar_kkn = mysqli_fetch_assoc($daftar_kkn)); ?>
                  </tbody>
                </table>
