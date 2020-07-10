
 <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <a href="../config/excel/excel_laporan_kkn.php" class="btn btn-primary" ><span class="fa fa-file"></span> Excel</a>
                <p></p>
                <thead>
                  <tr>
                    <th class="text-center" width="3%">No</th>
                    <th class="text-center" width="15%">Email</th>
                    <th class="text-center" width="20%">Nama Desa</th>
                    <th class="text-center" width="10%">Kecamatan</th>
                    <th class="text-center" width="20%">Kabupaten</th>
                    <th class="text-center" width="28%">Action</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                          $page = $pageNum_pengumpulan_laporan;
                          $no = $page  * $maxRows_pengumpulan_laporan + 1 ;
        
                        do { ?>
                  <tr >
                    <td class="text-center"><?php echo $no++; ?></td>
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
                    <td class="text-center"><a href="laporan_edit.php?id_pengumpulan=<?php echo $row_pengumpulan_laporan['id_pengumpulan'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="../data/data_hapus/hapus_laporan_kkn.php?id_pengumpulan=<?php echo $row_pengumpulan_laporan['id_pengumpulan'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a> <button class="show_data btn btn-primary" id=<?php echo $row_pengumpulan_laporan['id_pengumpulan']; ?>><span class="fa fa-eye"></span> Detail</a></button></td>
                  </tr>
                <?php  } while ($row_pengumpulan_laporan = mysqli_fetch_assoc($pengumpulan_laporan)); ?>
                  
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
			url:"../data/modal_data/modal_data_laporan_kkn.php",
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