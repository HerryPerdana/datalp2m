<div class="col-lg-12">
            <div class="form-panel">
              <form name="daftar_kkn" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                         <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-3 col-xs-11">
                              <input type="email" name="email" placeholder="Email" id="email" class="form-control" required="required" maxlength="20">
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-md-3">NIM</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="number" name="nim" placeholder="NIM" id="nim" class="form-control" required="required" maxlength="25">
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama" placeholder="Nama Lengkap" id="nama" class="form-control" required="required" maxlength="25">
                            </div>
                          </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Fakultas</label>
                  <div class="col-md-3 col-xs-11">
                <select name="fakultas" class="form-control">
                  <option value=" " >-- Pilih Fakultas --</option>
                  <option value="ftk" >FTK</option>
                  <option value="fdk" >FDK</option>
                  <option value="fuh" >FUH</option>
                  <option value="fs" >FS</option>
                  <option value="febi" >FEBI</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Jurusan</label>
                  <div class="col-md-3 col-xs-11">
                <select name="jurusan" class="form-control">
                  <option value=" " >-- Pilih Jusuran --</option>
                  <option value="hk" >Hukum Keluarga</option>
                  <option value="hes" >Hukum Ekonomi Syariah</option>
                  <option value="htn" >Hukum Tata Negara</option>
                  <option value="es" >Ekonomi Syariah</option>
                  <option value="ps" >Perbankan Syariah</option>
                  <option value="as" >Asuransi Syariah</option>
                  <option value="pa" >Perbandingan Agama</option>
                  <option value="th" >Tafsir Hadis</option>
                  <option value="pai" >Pendidikan Agama Islam</option>
                  <option value="pba" >Pendidikan Bahasa Arab</option>
                  <option value="pbi" >Pendidikan Bahasa Inggris</option>
                  <option value="pm" >Pendidikan Matematika</option>
                  <option value="mpi" >Manajemen Pendidikan Islam</option>
                  <option value="bki" >Bimbingan Konseling Islam</option>
                  <option value="pgmi" >PGMI</option>
                  <option value="piaud" >PIAUD</option>
                  <option value="ipii" >Ilmu Perpustakaan dan Informasi Islam</option>
                  <option value="pb" >Pendidikan Biologi</option>
                  <option value="pk" >Pendidikan Kimia</option>
                  <option value="pf" >Pendidikan Fisika</option>
                  <option value="pi" >Psikologi Islam</option>
                  <option value="md" >Manajemen Dakwah</option>
                  <option value="kpi" >Komunikasi dan Penyiaran Islam</option>
                  <option value="bpi" >Bimbingan dan Penyuluhan Islam</option>
                  <option value="pem" >Perbandingan Mazhab</option>
                  <option value="af" >Akidah Filsafat</option>

                </select>
              </div>
            </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Alamat Domisili</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_domisili" id="contact-message" placeholder="Alamat Domisili" rows="3" required="required"></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Alamat Daerah Asal <br> (Tulis Nama Jalan, Desa, dan Nama RT)</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_asal" id="contact-message" placeholder="Alamat Asal (Tulis Nama Jalan, Desa, dan Nama RT)" rows="3" required="required"></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                              <label class="control-label col-md-3">Nama Kecamatan Daerah Asal</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="kecamatan_asal" placeholder="Kecamatan Asal" id="kecamatan_asal" class="form-control" required="required" maxlength="25">
                            </div>
              </div>

              <div class="form-group">
                              <label class="control-label col-md-3">Nama Kabupaten Daerah Asal</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="kabupaten_asal" placeholder="Kabupaten Asal" id="kabupaten_asal" class="form-control" required="required" maxlength="25">
                            </div>
              </div>
                          
            <div class="form-group">
                  <label class="control-label col-md-3">Jenis Kelamin</label>
                  <div class="col-md-3 col-xs-11">
                <select name="jk" class="form-control">
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
                          
            <div class="form-group">
                  <label class="control-label col-md-3">Tempat Lahir</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" class="form-control" required="required" maxlength="25">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Lahir</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="tanggal_lahir" readonly value="01-01-2014" size="16" class="form-control" required="required">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                  </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Semester</label>
                <div class="col-md-3 col-xs-11">
                <select name="semester" class="form-control">
                  <option value="VI" >VI</option>
                  <option value="VII" >VII</option>
                  <option value="VIII" >VIII</option>
                  <option value="IX" >IX</option>
                  <option value="X" >X</option>
                  <option value="XI" >XI</option>
                  <option value="XII" >XII</option>
                  <option value="XIII" >XIII</option>
                  <option value="XIV" >XIV</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nomor WA</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="no_wa" placeholder="Nomor Whatsapp" id="no_wa" class="form-control" required="required" maxlength="25">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nama Orang Tua</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama_ortu" placeholder="Nama Orang Tua" id="nama_ortu" class="form-control" required="required" maxlength="25">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nomor Telepon Orang Tua</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="no_telp_ortu" placeholder="Nomor Telepon Orang Tua" id="no_telp_ortu" class="form-control" required="required" maxlength="25">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Alamat Orang Tua / Wali</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua / Wali" rows="3" required="required"></textarea>
                <div class="validate"></div>
                </div>
            </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Jumlah Perolehan SKS</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="sks" placeholder="Jumlah Perolehan SKS" id="sks" class="form-control" required="required" maxlength="25">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">IPK (Minimal 2.0)</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="ipk" placeholder="Nilai IPK" id="ipk" class="form-control" required="required" maxlength="25">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Nilai Tes Keterampilan Keamagaan (TKK)</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="tkk" placeholder="Nilai Tes Keterampilan Keagamaan (TKK)" id="tkk" class="form-control" required="required" maxlength="25">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Organisasi yang Diikuti <br> (Jika Tidak Ada Tulis Tidak Ada)</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="organisasi" id="organisasi" placeholder="Organisasi yang Diikuti (Jika Tidak Ada Tulis Tidak Ada)" rows="3" required="required"></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Keterampilan Keagamaan Khusus</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="keterampilan_keagamaan" placeholder="Keterampilan Keagamaan Khusus" id="keterampilan_keagamaan" class="form-control" required="required" maxlength="50">
                            </div>
            </div>


              <div class="form-group">
                  <label class="control-label col-md-3">Scan Kartu Tanda Mahasiswa</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="ktm" accept="application/pdf" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Surat Kesediaan Mengikuti KKN</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="surat_kesediaan" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Surat Izin Orang Tua / Wali / Pasangan</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="surat_izin" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Surat Keterangan Perolehan SKS dan IPK dari Mikwa Fakultas Masing-masing</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="surat_sks_ipk" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Printout Rincian transkrip dari SIAKAD Online UIN Antasari</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="rincian_transkrip" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Surat Keterangan Perolehan SKK minimal 40 dari Fakultas</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="keterangan_skk" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Slip Setoran Biaya KKN Untuk Yang Belum Memakai Sistem UKT / Scan Slip Setoran UKT Terbaru</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="slip_setoran" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Scan Sertifikat Keterampilan Keagamaan dari Fakultas</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="sertifikat_keterampilan" required class="default" accept="application/pdf, .jpg" />
                      </span>
                        <span class="help-block">Maksimal 2 mb pdf / jpg</span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="control-label col-md-3">Pas Foto</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <span class="help-block">Latar biru untuk KKN semester genap atau latar merah untuk KKN semester ganjil, file JPG maksimal 2 mb</span>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="pas_foto" class="default"  required="required" accept=".jpg" />
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
                
                
                
                 <input type="hidden" name="MM_insert" value="daftar_kkn">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->