 <!-- page start-->
          <div class="content-panel">
          
     

<div class="goleft">
<table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
  <tr>
    
    <td align="left" width="5%" > &nbsp;&nbsp;&nbsp;&nbsp;Tampilkan </td>
    <td align="left" width="5%" ><form method="get">
  <select name="baris" onchange='if(this.value != 0) { this.form.submit(); }' class="span11">
  								<option value="2"><?php echo  $maxRows_dokumen ?></option>
                                <option value="5">5</option>
                                <option value="10" >10</option>
                                <option value="25">25</option>
                                <option value="50" >50</option>
                                <option value="100">100</option>
                              </select></form></td>
                               <td align="left" width="4%"> Record</td>
                               
                               <td align="right">       <div id="search" class="goright">
 <form method="get">
  <input type="text" name="cari" placeholder="Cari Dokumen"/>
  <button type="submit" class="tip-bottom" title="Search" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1"><i class="fa fa-glass"></i></button></form>
</div></td>
  </tr>
 
</table>

      <p>&nbsp;</p>    
</div>

          
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" >
                <thead>
                  <tr>
                    <th class=" centered"width="5%">No</th>
                    <th class=" centered" width="25%">Nama Dokumen</th>
                    <th class=" centered" width="25%">Action</th>
                  </tr>
                </thead>
                  <?php 
			   $page = $pageNum_dokumen;
  $no = $page  * $maxRows_dokumen + 1 ;
			  
			   do { ?>
                <tbody>
                  <tr>
                    <td class="center hidden-phone"><?php echo $no++; ?></td>
                    <td class="center hidden-phone"><?php echo $row_dokumen['nama_dokumen']; ?></td>
                     <td class="center hidden-phone"><a href="dokumen_edit.php?id_dokumen=<?php echo $row_dokumen['id_dokumen'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="../data/data_hapus/hapus_dokumen.php?id_dokumen=<?php echo $row_dokumen['id_dokumen'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a>  <a href="../config/download/download_dokumen.php?filename=<?php echo $row_dokumen['lampiran'];?>" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a></td>
                  </tr>
                </tbody>
                 <?php  } while ($row_dokumen = mysqli_fetch_assoc($dokumen)); ?>
              </table>
            </div>
            
             <div class=" pager "> 
				<ul>

        <!-- LINK FIRST AND PREV -->
        <?php
        if($pageNum_dokumen == 0){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($pageNum_dokumen > 0)? $pageNum_dokumen - 1 : 0;
        ?>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, 0, $queryString_dokumen); ?>">First</a></li>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, max(0, $pageNum_dokumen - 1), $queryString_dokumen); ?>">&laquo;</a></li>
        <?php
        }
        ?>
       
       
       <!-- LINK NUMBER -->
        <?php
		
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number =($pageNum_dokumen > $jumlah_number)? $pageNum_dokumen - $jumlah_number : 0;// Untuk awal link number
        $end_number = ($pageNum_dokumen < ($totalPages_dokumen - $jumlah_number))? $pageNum_dokumen + $jumlah_number : $totalPages_dokumen; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($pageNum_dokumen  == $i)? ' class="paginate_active"' : '';
		  $nomor = $i;
		 
        ?>
          <li<?php echo $link_active; ?>><a href="<?php printf("%s?pageNum_dokumen=%d%s",  $currentPage, $nomor , $queryString_dokumen);  ?>"><?php echo $i+1; ?></a></li>

            <?php
			
			
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($pageNum_dokumen == $totalPages_dokumen){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
        ?>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, min($totalPages_dokumen, $pageNum_dokumen + 1), $queryString_dokumen); ?>">&raquo;</a></li>
          <li><a href="<?php printf("%s?pageNum_dokumen=%d%s", $currentPage, $totalPages_dokumen, $queryString_dokumen); ?>">Last</a></li>
        <?php
        }
        ?>
        
        </ul>
       <!-- Paging end here --> 
        
        
        <!-- convert zone
<table width="15%" border="0" align="left" cellpadding="4" cellspacing="4">
  <tr>
    <td align="center"><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></td>
    <td align="center"><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></td>
  </tr>
</table> -->

</div>
            
            
          </div>
          <!-- page end-->