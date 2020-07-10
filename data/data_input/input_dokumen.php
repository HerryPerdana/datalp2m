<div class="col-lg-12">
            <div class="form-panel">
              <form name="tambah" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data" id="dokumen">
              
                <div class="form-group">
                            <label class="col-lg-2 control-label">Nama Dokumen :</label>
                            <div class="col-lg-6">
                              <input type="text" name="nama_dokumen" placeholder="Nama Dokumen" id="c-name" class="form-control" required maxlength="225">
                            </div>
                          </div>
                          
            <div class="form-group">
              <label class="col-lg-2 control-label">Unit : </label>
              <div class="col-lg-6">
                <select name="unit" id="unit" onchange="tampilkan()">
                  <option value=" " >-- Pilih Unit --</option>
                  <option value="pp">Penelitian & Penerbitan</option>
                  <option value="pm">Pengabdian Masyarakat</option>
                  <option value="ga">Studi Gender & Anak</option>
                </select>
              </div>
            </div>
                          
            <div class="form-group">
              <label class="col-lg-2 control-label">Tipe : </label>
              <div class="col-lg-6">
                <select name="tipe" id="tipe">
                  <option value=" " >-- Pilih Tipe --</option>
                 
                </select>
              </div>
            </div>
            
                          
                          
                <div class="form-group">
                  <label class="control-label col-md-3">Upload Dokumen</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="lampiran" required class="default" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>
                
              <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Simpan</button>
                              <button class="btn btn-theme04" type="button">Batal</button>
                            </div>
                          </div>   
                
                
                
                 <input type="hidden" name="MM_insert" value="tambah">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->

<script>
function tampilkan(){
  var unit=document.getElementById("dokumen").unit.value;
  if (unit=="pp")
    {
        document.getElementById("tipe").innerHTML="<option value='sk'>Surat Keterangan</option><option value='sr'>Surat Resmi</option><option value='st'>Surat Tugas</option><option value='hp'>Hasil Penelitian</option><option value='btl'>Buku Terbitan LP2M</option>";

    }
  else if (unit=="pm")
    {
        document.getElementById("tipe").innerHTML="<option value='sk'>Surat Keterangan</option><option value='sr'>Surat Resmi</option><option value='st'>Surat Tugas</option>";
       
    } else if (unit=="ga")
    {
        document.getElementById("tipe").innerHTML="<option value='sk'>Surat Keterangan</option><option value='sr'>Surat Resmi</option><option value='st'>Surat Tugas</option>";
       
    }
   
}
</script>