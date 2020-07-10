  <div class="col-lg-12">
            <div class="form-panel">
              <form name="edit_daftar_kkn" method="post" action="<?php $editFormAction ?>" class="form-horizontal style-form" enctype="multipart/form-data">
              
                 
                         <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-3 col-xs-11">
                              <input type="email" name="email" placeholder="Email" id="email" class="form-control" required="required" maxlength="20" value="<?php echo $row_daftar_ulang['email']; ?>" >
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-md-3">NIM</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="number" name="nim" placeholder="NIM" id="nim" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['nim']; ?>" >
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="control-label col-md-3">Nama</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama" placeholder="Nama Lengkap" id="nama" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['nama']; ?>">
                              </div>
                          </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Fakultas</label>
                  <div class="col-md-3 col-xs-11">
                  <select name="fakultas" class="form-control">
                  <option <?php if($row_daftar_ulang['fakultas'] == 'ftk') { echo "selected"; }?> value="ftk" >FTK</option>
                  <option <?php if($row_daftar_ulang['fakultas'] == 'fdk') { echo "selected"; }?> value="fdk" >FDK</option>
                  <option <?php if($row_daftar_ulang['fakultas'] == 'fuh') { echo "selected"; }?> value="fuh" >FUH</option>
                  <option <?php if($row_daftar_ulang['fakultas'] == 'fs') { echo "selected"; }?> value="fs" >FS</option>
                  <option <?php if($row_daftar_ulang['fakultas'] == 'febi') { echo "selected"; }?> value="febi" >FEBI</option>
                  </select>
                  </div>
              </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Jurusan</label>
                  <div class="col-md-3 col-xs-11">
                  <select name="jurusan" class="form-control">

                  <option value="hk" <?php if($row_daftar_ulang['jurusan'] == 'hk') { echo "selected"; }?> >Hukum Keluarga</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'hes') { echo "selected"; }?> value="hes" >Hukum Ekonomi Syariah</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'htn') { echo "selected"; }?> value="htn" >Hukum Tata Negara</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'es') { echo "selected"; }?> value="es" >Ekonomi Syariah</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'ps') { echo "selected"; }?> value="ps" >Perbankan Syariah</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'as') { echo "selected"; }?> value="as" >Asuransi Syariah</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pa') { echo "selected"; }?> value="pa" >Perbandingan Agama</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'th') { echo "selected"; }?> value="th" >Tafsir Hadis</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pai') { echo "selected"; }?> value="pai" >Pendidikan Agama Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pba') { echo "selected"; }?> value="pba" >Pendidikan Bahasa Arab</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pbi') { echo "selected"; }?> value="pbi" >Pendidikan Bahasa Inggris</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pm') { echo "selected"; }?> value="pm" >Pendidikan Matematika</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'mpi') { echo "selected"; }?> value="mpi" >Manajemen Pendidikan Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'bki') { echo "selected"; }?> value="bki" >Bimbingan Konseling Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pgmi') { echo "selected"; }?> value="pgmi" >PGMI</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'piaud') { echo "selected"; }?> value="piaud" >PIAUD</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'ipii') { echo "selected"; }?> value="ipii" >Ilmu Perpustakaan dan Informasi Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pb') { echo "selected"; }?> value="pb" >Pendidikan Biologi</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pk') { echo "selected"; }?> value="pk" >Pendidikan Kimia</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pf') { echo "selected"; }?> value="pf" >Pendidikan Fisika</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pi') { echo "selected"; }?> value="pi" >Psikologi Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'md') { echo "selected"; }?> value="md" >Manajemen Dakwah</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'kpi') { echo "selected"; }?> value="kpi" >Komunikasi dan Penyiaran Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'bpi') { echo "selected"; }?> value="bpi" >Bimbingan dan Penyuluhan Islam</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'pem') { echo "selected"; }?> value="pem" >Perbandingan Mazhab</option>
                  <option <?php if($row_daftar_ulang['jurusan'] == 'af') { echo "selected"; }?> value="af" >Akidah Filsafat</option>

                 </select>
                 </div>
            </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Alamat Domisili</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_domisili" id="contact-message" placeholder="Alamat Domisili" rows="3" required="required"><?php echo $row_daftar_ulang['alamat_domisili']; ?></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Alamat Daerah Asal <br> (Tulis Nama Jalan, Desa, dan Nama RT)</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_asal" id="contact-message" placeholder="Alamat Asal (Tulis Nama Jalan, Desa, dan Nama RT)" rows="3" required="required"><?php echo $row_daftar_ulang['alamat_asal']; ?></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                              <label class="control-label col-md-3">Nama Kecamatan Daerah Asal</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="kecamatan_asal" placeholder="Kecamatan Asal" id="kecamatan_asal" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['kecamatan_asal']; ?>">
                            </div>
              </div>

              <div class="form-group">
                              <label class="control-label col-md-3">Nama Kabupaten Daerah Asal</label>
                              <div class="col-md-3 col-xs-11">
                              <input type="text" name="kabupaten_asal" placeholder="Kabupaten Asal" id="kabupaten_asal" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['kabupaten_asal']; ?>">
                            </div>
              </div>
                          
            <div class="form-group">
                  <label class="control-label col-md-3">Jenis Kelamin</label>
                  <div class="col-md-3 col-xs-11">
                <select name="jk" class="form-control">
                  <option <?php if($row_daftar_ulang['jk'] == 'L') { echo "selected"; }?> value="L">Laki - Laki</option>
                  <option <?php if($row_daftar_ulang['jk'] == 'P') { echo "selected"; }?> value="P">Perempuan</option>
                </select>
              </div>
            </div>
                          
            <div class="form-group">
                  <label class="control-label col-md-3">Tempat Lahir</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['tempat_lahir']; ?>">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Lahir</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="tanggal_lahir" readonly value="<?php echo date("d M Y", strtotime($row_daftar_ulang['tanggal_lahir'])); ?>" size="16" class="form-control" required="required">
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
                  <option <?php if($row_daftar_ulang['semester'] == 'VI') { echo "selected"; }?> value="VI" >VI</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'VII') { echo "selected"; }?> value="VII" >VII</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'VIII') { echo "selected"; }?> value="VIII" >VIII</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'IX') { echo "selected"; }?> value="IX" >IX</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'X') { echo "selected"; }?> value="X" >X</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'XI') { echo "selected"; }?> value="XI" >XI</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'XII') { echo "selected"; }?> value="XII" >XII</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'XIII') { echo "selected"; }?> value="XIII" >XIII</option>
                  <option <?php if($row_daftar_ulang['semester'] == 'XIV') { echo "selected"; }?> value="XIV" >XIV</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nomor WA</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="no_wa" placeholder="Nomor Whatsapp" id="no_wa" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['no_wa']; ?>">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nama Orang Tua</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="nama_ortu" placeholder="Nama Orang Tua" id="nama_ortu" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['nama_ortu']; ?>">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Nomor Telepon Orang Tua</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="no_telp_ortu" placeholder="Nomor Telepon Orang Tua" id="no_telp_ortu" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['no_telp_ortu']; ?>">
                            </div>
            </div>

            <div class="form-group">
                  <label class="control-label col-md-3">Alamat Orang Tua / Wali</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua / Wali" rows="3" required="required"><?php echo $row_daftar_ulang['alamat_ortu']; ?></textarea>
                <div class="validate"></div>
                </div>
            </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Jumlah Perolehan SKS</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="sks" placeholder="Jumlah Perolehan SKS" id="sks" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['sks']; ?>">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">IPK (Minimal 2.0)</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="ipk" placeholder="Nilai IPK" id="ipk" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['ipk']; ?>">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Nilai Tes Keterampilan Keamagaan (TKK)</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="number" name="tkk" placeholder="Nilai Tes Keterampilan Keagamaan (TKK)" id="tkk" class="form-control" required="required" maxlength="25" value="<?php echo $row_daftar_ulang['tkk']; ?>">
                            </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Organisasi yang Diikuti <br> (Jika Tidak Ada Tulis Tidak Ada)</label>
                  <div class="col-md-3 col-xs-11">
                <textarea class="form-control" name="organisasi" id="organisasi" placeholder="Organisasi yang Diikuti (Jika Tidak Ada Tulis Tidak Ada)" rows="3" required="required"><?php echo $row_daftar_ulang['organisasi']; ?></textarea>
                <div class="validate"></div>
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Keterampilan Keagamaan Khusus</label>
                  <div class="col-md-3 col-xs-11">
                              <input type="text" name="keterampilan_keagamaan" placeholder="Keterampilan Keagamaan Khusus" id="keterampilan_keagamaan" class="form-control" required="required" maxlength="50" value="<?php echo $row_daftar_ulang['keterampilan_keagamaan']; ?>" >
                            </div>
            </div>


              <div class="form-group">
                  <label class="control-label col-md-3">Scan Kartu Tanda Mahasiswa</label>
                  <div class="controls col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" name="ktm" required class="default" accept="application/pdf, .jpg" />
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
                
                    <p>&nbsp;</p>
                    <p class="text-warning">*Harap Pastikan Semua File Telah Di Upload Ulang</p>
                    
              <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Simpan</button>
                              <button class="btn btn-theme04" type="reset">Batal</button>
                            </div>
                          </div>   
                
                  <input type="hidden" name="id_daftar_ulang" value="<?php echo $row_daftar_ulang['id_daftar_ulang']; ?>"/>
                 <input type="hidden" name="MM_update" value="edit_daftar_kkn">
                
              </form>
             
              <p>&nbsp;</p>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->

