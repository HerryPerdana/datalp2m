
 <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <a href="../config/excel/excel_kkn.php" class="btn btn-primary" ><span class="fa fa-file"></span> Excel</a>
                <p></p>
                <thead>
                  <tr>
                    <th class="text-center" width="3%">No</th>
                    <th class="text-center" width="15%">NIM</th>
                    <th class="text-center" width="20%">Nama</th>
                    <th class="text-center" width="10%">Fakultas</th>
                    <th class="text-center" width="20%">Jurusan</th>
                    <th class="text-center" width="28%">Action</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                          $page = $pageNum_daftar_ulang;
                          $no = $page  * $maxRows_daftar_ulang + 1 ;
        
                        do { ?>
                  <tr >
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $row_daftar_ulang['nim']; ?></td>
                    <td class="text-center"><?php echo $row_daftar_ulang['nama']; ?></td>
                    <td class="text-center"><?php 
                          if( $row_daftar_ulang['fakultas'] == "ftk"){
                            echo "FTK";
                          }else if( $row_daftar_ulang['fakultas'] == "fdk"){
                            echo "FDK";
                          }else if( $row_daftar_ulang['fakultas'] == "fuh"){
                            echo "FUH";
                          }else if( $row_daftar_ulang['fakultas'] == "fs"){
                            echo "FS";
                          }else if( $row_daftar_ulang['fakultas'] == "febi"){
                            echo "FEBI";
                          }else{
                            echo "Fakultas Tidak Terdaftar";
                          }


                     ?></td>
                    <td class="text-center"><?php 
                          if( $row_daftar_ulang['jurusan'] == "hk"){
                            echo "Hukum Keluarga";
                          }else if( $row_daftar_ulang['jurusan'] == "hes"){
                            echo "Hukum Ekonomi Syariah";
                          }else if( $row_daftar_ulang['jurusan'] == "htn"){
                            echo "Hukum Tata Negara";
                          }else if( $row_daftar_ulang['jurusan'] == "es"){
                            echo "Ekonomi Syariah";
                          }else if( $row_daftar_ulang['jurusan'] == "ps"){
                            echo "Perbankan Syariah";
                          }else if( $row_daftar_ulang['jurusan'] == "as"){
                            echo "Asuransi Syariah";
                          }else if( $row_daftar_ulang['jurusan'] == "pa"){
                            echo "Perbandingan Agama";
                          }else if( $row_daftar_ulang['jurusan'] == "th"){
                            echo "Tafsir Hadist";
                          }else if( $row_daftar_ulang['jurusan'] == "pai"){
                            echo "Pendidikan Agama Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "pba"){
                            echo "Pendidikan Bahasa Arab";
                          }else if( $row_daftar_ulang['jurusan'] == "pbi"){
                            echo "Pendidikan Bahasa Inggris";
                          }else if( $row_daftar_ulang['jurusan'] == "pm"){
                            echo "Pendidikan Matematika";
                          }else if( $row_daftar_ulang['jurusan'] == "mpi"){
                            echo "Manajemen Pendidikan Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "bki"){
                            echo "Bimbingan Konseling Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "pgmi"){
                            echo "PGMI";
                          }else if( $row_daftar_ulang['jurusan'] == "piaud"){
                            echo "PIAUD";
                          }else if( $row_daftar_ulang['jurusan'] == "ipii"){
                            echo "Ilmu Perpustakaan dan Informasi Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "pb"){
                            echo "Pendidikan Biologi";
                          }else if( $row_daftar_ulang['jurusan'] == "pk"){
                            echo "Pendidikan Kimia";
                          }else if( $row_daftar_ulang['jurusan'] == "pf"){
                            echo "Pendidikan Fisika";
                          }else if( $row_daftar_ulang['jurusan'] == "pi"){
                            echo "Psikologi Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "md"){
                            echo "Manajemen Dakwah";
                          }else if( $row_daftar_ulang['jurusan'] == "kpi"){
                            echo "Komunikasi dan Penyiaran Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "bpi"){
                            echo "Bimbingan dan Penyuluhan Islam";
                          }else if( $row_daftar_ulang['jurusan'] == "pem"){
                            echo "Perbandingan Mazhab";
                          }else if( $row_daftar_ulang['jurusan'] == "af"){
                            echo "Akidah Filsafat";
                          }else{
                            echo "Jurusan Tidak Terdaftar";
                          }

                     ?></td>
                    <td class="text-center"><a href="daftar_ulang_edit.php?id_daftar_ulang=<?php echo $row_daftar_ulang['id_daftar_ulang'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="../data/data_hapus/hapus_daftar_kkn.php?id_daftar_ulang=<?php echo $row_daftar_ulang['id_daftar_ulang'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a> <button class="show_data btn btn-primary" id=<?php echo $row_daftar_ulang['id_daftar_ulang']; ?>><span class="fa fa-eye"></span> Detail</a></button></td>
                  </tr>
                <?php  } while ($row_daftar_ulang = mysqli_fetch_assoc($daftar_ulang)); ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->

</div>
            
            
               <!-- Modal start here -->
   
  <div class="modal fade" id="dataModal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content" id="data">
					<!-- Data Show Here -->
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).on('click','.show_data',function()
	{
		var id=$(this).attr("id");
		$.ajax({
			url:"../data/modal_data/modal_data_kkn.php",
			method:"post",
			data:{id:id},
			success:function(data)
			{
				$('#data').html(data);
				$('#dataModal').modal("show");
			}
		});
	});
	</script>
<!-- End of Modal -->

            
            
          </div>
          <!-- page end-->