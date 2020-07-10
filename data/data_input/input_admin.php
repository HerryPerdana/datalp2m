<div class="col-lg-12">
            <div class="form-panel">
              <form name="admin" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                         <div class="form-group">
                            <label class="control-label col-md-3">NIP</label>
                            <div class="col-md-3 col-xs-11">
                              <input type="text" name="nip" placeholder="NIP" id="c-name" class="form-control" required="required" maxlength="20">
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama_admin" placeholder="Nama Lengkap" id="c-name" class="form-control" required="required" maxlength="25">
                            </div>
                          </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_admin" id="contact-message" placeholder="Alamat" rows="8" required="required"></textarea>
                <div class="validate"></div>
                </div>
              </div>
                          
                          <div class="form-group">
                  <label class="control-label col-md-3">No. Handphone</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="cp" placeholder="No. Handphone" id="c-name" class="form-control" required="required" maxlength="20">
                            </div>
                          </div>
                          
            <div class="form-group">
                  <label class="control-label col-md-3">Status</label>
                  <div class="col-md-3 col-xs-11">
                <select name="jabatan" class="form-control">
                  <option value="Admin" <?php if (!(strcmp("Admin", ""))) {echo "SELECTED";} ?>>Admin</option>
                  <option value="Staff" <?php if (!(strcmp("Staff", ""))) {echo "SELECTED";} ?>>Staff</option>
                </select>
              </div>
            </div>
                          
                          <div class="form-group">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="username" placeholder="Username" id="c-name" class="form-control" required="required" maxlength="25">
                            </div>
                          </div>
                          <div class="form-group">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="password" name="password" placeholder="" id="c-name" class="form-control" required="required" maxlength="25">
                            </div>
                          </div>
                          
                          
                          
                <div class="form-group">
                  <label class="control-label col-md-3">Foto Admin</label>
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
                        <input type="file" name="foto" class="default"  required="required" />
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
                
                
                
                 <input type="hidden" name="MM_insert" value="admin">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->