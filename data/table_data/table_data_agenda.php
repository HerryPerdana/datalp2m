 <!-- page start-->
          <div class="content-panel">
          
     

<div class="goleft">
<table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
  <tr>
    
    <td align="left" width="5%" > &nbsp;&nbsp;&nbsp;&nbsp;Tampilkan </td>
    <td align="left" width="5%" ><form method="get">
  <select name="baris" onchange='if(this.value != 0) { this.form.submit(); }' class="span11">
  								<option value="2"><?php echo  $maxRows_agenda ?></option>
                                <option value="5">5</option>
                                <option value="10" >10</option>
                                <option value="25">25</option>
                                <option value="50" >50</option>
                                <option value="100">100</option>
                              </select></form></td>
                               <td align="left" width="4%"> Record</td>
                               
                               <td align="right">       <div id="search" class="goright">
 <form method="get">
  <input type="text" name="cari" placeholder="Cari Agenda"/>
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
                    <th class=" centered" width="10%">Tanggal</th>
                    <th class=" centered" width="25%">Nama Agenda</th>
                    <th class=" centered" width="20%">Penyelenggara</th>
                    <th class=" centered" width="25%">Action</th>
                  </tr>
                </thead>
                  <?php 
			   $page = $pageNum_agenda;
  $no = $page  * $maxRows_agenda + 1 ;
			  
			   do { ?>
                <tbody>
                  <tr>
                    <td class="center hidden-phone"><?php echo $no++; ?></td>
                    
                    <td class="center hidden-phone"><?php echo date("d M Y ", strtotime($row_agenda['penanggalan'])); ?></td>
                    <td class="center hidden-phone"><?php echo $row_agenda['nama_agenda']; ?></td>
                    <td class="center hidden-phone"><?php echo $row_agenda['penyelenggara']; ?></td>
                     <td class="center hidden-phone"><a href="agenda_edit.php?id_agenda=<?php echo $row_agenda['id_agenda'];?>" class="btn btn-primary" ><span class="fa fa-edit"></span> Edit</a>  <a href="../data/data_hapus/hapus_agenda.php?id_agenda=<?php echo $row_agenda['id_agenda'];?>" class="btn btn-primary" ><span class="fa fa-trash-o"></span> Hapus</a> <a href="../config/download/download_agenda.php?filename=<?php echo $row_agenda['lampiran'];?>" class="btn btn-primary" ><span class="fa fa-download"></span> Download </a> </td>
                  </tr>
                  
                  
                </tbody>
                 <?php  } while ($row_agenda = mysqli_fetch_assoc($agenda)); ?>
              </table>
            </div>
            
             <div class=" pager "> 
				<ul>

        <!-- LINK FIRST AND PREV -->
        <?php
        if($pageNum_agenda == 0){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($pageNum_agenda > 0)? $pageNum_agenda - 1 : 0;
        ?>
          <li><a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, 0, $queryString_agenda); ?>">First</a></li>
          <li><a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, max(0, $pageNum_agenda - 1), $queryString_agenda); ?>">&laquo;</a></li>
        <?php
        }
        ?>
       
       
       <!-- LINK NUMBER -->
        <?php
		
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number =($pageNum_agenda > $jumlah_number)? $pageNum_agenda - $jumlah_number : 0;// Untuk awal link number
        $end_number = ($pageNum_agenda < ($totalPages_agenda - $jumlah_number))? $pageNum_agenda + $jumlah_number : $totalPages_agenda; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($pageNum_agenda  == $i)? ' class="paginate_active"' : '';
		  $nomor = $i;
		 
        ?>
          <li<?php echo $link_active; ?>><a href="<?php printf("%s?pageNum_agenda=%d%s",  $currentPage, $nomor , $queryString_agenda);  ?>"><?php echo $i+1; ?></a></li>

            <?php
			
			
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($pageNum_agenda == $totalPages_agenda){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
        ?>
          <li><a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, min($totalPages_agenda, $pageNum_agenda + 1), $queryString_agenda); ?>">&raquo;</a></li>
          <li><a href="<?php printf("%s?pageNum_agenda=%d%s", $currentPage, $totalPages_agenda, $queryString_agenda); ?>">Last</a></li>
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