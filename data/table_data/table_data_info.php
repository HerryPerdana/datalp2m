
 <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <a href="../config/excel/excel_laporan_kkn.php" class="btn btn-primary" ><span class="fa fa-file"></span> Excel</a>
                <p></p>
                <thead>
                  <tr>
                    <th class="text-center" width="3%">No</th>
                    <th class="text-center" width="70%">Nama</th>
                    <th class="text-center" width="28%">Action</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                          $page = $pageNum_info;
                          $no = $page  * $maxRows_info + 1 ;
        
                        do { ?>
                  <tr >
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $row_info['nama_info']; ?></td>
                   
                   
                   
                    <td class="text-center"><a href="info_edit.php?id_info=<?php echo $row_info['id_info'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="../data/data_hapus/hapus_info_kkn.php?id_info=<?php echo $row_info['id_info'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a> <a href="../config/download/download_dokumen.php?filename=<?php echo $row_info['lampiran'];?>" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
                  </tr>
                <?php  } while ($row_info = mysqli_fetch_assoc($info)); ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->

</div>
            
            
       
 

            
            
          </div>
          <!-- page end-->