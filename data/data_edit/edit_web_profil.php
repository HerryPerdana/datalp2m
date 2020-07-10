<div class="col-lg-12">
            <div class="form-panel">
              <form name="profil" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                      
                      
                          <div class="form-group">
                  <label class="control-label col-md-3">Profil</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="profil" id="contact-message" placeholder="Profil" rows="20" required="required"><?php echo htmlentities($row_profil['profil'], ENT_COMPAT, 'utf-8'); ?></textarea>
                <div class="validate"></div>
                </div>
              </div>
              
              
                          <div class="form-group">
                  <label class="control-label col-md-3">Visi & Misi</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="visimisi" id="contact-message" placeholder="Visi & Misi" rows="20" required="required"><?php echo htmlentities($row_profil['visimisi'], ENT_COMPAT, 'utf-8'); ?></textarea>
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
                
                
                <input type="hidden" name="id_profil" value="<?php echo $row_profil['id_profil']; ?>" />
                 <input type="hidden" name="MM_update" value="profil">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->