<div class="col-lg-12">
            <div class="form-panel">
              <form name="berita" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                         <div class="form-group">
                  <label class="control-label col-md-3">Judul</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="judul" placeholder="Judul Berita" id="c-name" class="form-control" required="required" value="<?php echo htmlentities($row_berita['judul'], ENT_COMPAT, 'utf-8'); ?>">
                            </div>
                          </div>
                      
                          
                         <div class="form-group">
                  <label class="control-label col-md-3">Tanggal</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="tanggal" readonly value="<?php echo htmlentities($row_berita['tanggal'], ENT_COMPAT, 'utf-8'); ?>" size="16" class="form-control" required="required">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
            
                          <div class="form-group">
                  <label class="control-label col-md-3">Isi</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="isi" id="contact-message" placeholder="isi Berita" rows="20" required="required"><?php echo htmlentities($row_berita['isi'], ENT_COMPAT, 'utf-8'); ?></textarea>
                <div class="validate"></div>
                </div>
              </div>
                          
                          
                <div class="form-group">
                  <label class="control-label col-md-3">Gambar</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="gambar" class="default"  required="required" />
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                
              <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Simpan</button>
                              <button class="btn btn-theme04" type="reset">Batal</button>
                            </div>
                          </div>   
                
                
                <input type="hidden" name="id_berita" value="<?php echo $row_berita['id_berita']; ?>" />
                 <input type="hidden" name="MM_update" value="berita">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->