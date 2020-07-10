<div class="col-lg-12">
            <div class="form-panel">
              <form name="pengumpulan_laporan" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data" id="pengumpulan_laporan">
              
                 
                         <div class="form-group">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="email" name="email" placeholder="Email" id="c-name" class="form-control" required="required" maxlength="150">
                            </div>
                          </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Kabupaten</label>
                  <div class="col-md-3 col-xs-11">
                <select name="kabupaten" class="form-control" id="kabupaten" onchange="tampilkan()">
                  <option value=" " >-- Pilih Kabupaten --</option>
                  <option value="t" >Tapin</option>
                  <option value="b" >Banjar</option>
                  <option value="hsu">Hulu Sungai Utara</option>
                </select>
              </div>
            </div>
                 
                  <div class="form-group">
                  <label class="control-label col-md-3">Kecamatan</label>
                  <div class="col-md-3 col-xs-11">
                <select name="kecamatan" class="form-control" id="kecamatan">
                 
                </select>
              </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nama Desa</label>
                  <div class="col-md-3 col-xs-11">
                <select name="nama_desa" class="form-control" id="nama_desa">
                 
                </select>
              </div>
            </div>
            
             <div class="form-group">
                  <label class="control-label col-md-3">Upload Laporan Program Kerja</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="laporan_program_kerja" required class="default" accept="application/pdf" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Upload Laporan KKN (Keseluruhan)</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="laporan_kkn" required class="default" accept="application/pdf" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>
                
              <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Simpan</button>
                              <button class="btn btn-theme04" type="reset">Batal</button>
                            </div>
                          </div>   
                
                
                
                 <input type="hidden" name="MM_insert" value="pengumpulan_laporan">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->

<script>
function tampilkan(){
  var kabupaten=document.getElementById("pengumpulan_laporan").kabupaten.value;
  if (kabupaten=="t")
    {
        document.getElementById("kecamatan").innerHTML="<option value=''>-- Pilih Kecamatan --</option><option value='ts'>Tapin Selatan</option><option value='tt'>Tapin Tengah</option><option value='cls'>Candi Laras Selatan</option>";

         document.getElementById("nama_desa").innerHTML="<option value=''>-- Pilih Desa --</option><option value='s'>Suput</option><option value='h'>Haruai</option><option value='n'>Nawin</option><option value='sm'>Sungai Miai</option>";
    }
  else if (kabupaten=="b")
    {
        document.getElementById("kecamatan").innerHTML="<option value=''>-- Pilih Kecamatan --</option><option value='p'>paramasan</option>";
        document.getElementById("nama_desa").innerHTML="<option value=''>-- Pilih Desa --</option><option value='s'>Suput</option><option value='h'>Haruai</option><option value='n'>Nawin</option><option value='sm'>Sungai Miai</option>";
    }
    else if (kabupaten=="hsu")
    {
        document.getElementById("kecamatan").innerHTML="<option value=''>-- Pilih Kecamatan --</option><option value='dp'>Danau Panggang</option>";
        document.getElementById("nama_desa").innerHTML="<option value=''>-- Pilih Desa --</option><option value='s'>Suput</option><option value='h'>Haruai</option><option value='n'>Nawin</option><option value='sm'>Sungai Miai</option>";
    }
}
</script>