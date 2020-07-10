<div class="col-lg-12">
            <div class="form-panel">
              <form name="agenda" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                         <div class="form-group">
                  <label class="control-label col-md-3">Nama Agenda</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama_agenda" placeholder="Nama Agenda" id="c-name" class="form-control" required="required" maxlength="150" value="<?php echo htmlentities($row_agenda['nama_agenda'], ENT_COMPAT, 'utf-8'); ?>">
                            </div>
                          </div>
                          
                           <div class="form-group">
                  <label class="control-label col-md-3">Penyelenggara</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="penyelenggara" placeholder="Penyelenggara" id="c-name" class="form-control" required="required" maxlength="225" value="<?php echo htmlentities($row_agenda['penyelenggara'], ENT_COMPAT, 'utf-8'); ?>">
                            </div>
                          </div>
                      
                          
                         <div class="form-group">
                  <label class="control-label col-md-3">Tanggal</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="penanggalan" readonly value="01-01-2014" size="16" class="form-control" required="required" value="<?php echo htmlentities($row_agenda['penanggalan'], ENT_COMPAT, 'utf-8'); ?>">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
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
                              <button class="btn btn-theme04" type="reset">Batal</button>
                            </div>
                          </div>   
                
                
                 <input type="hidden" name="id_agenda" value="<?php echo $row_agenda['id_agenda']; ?>" />
                 <input type="hidden" name="MM_update" value="agenda">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->