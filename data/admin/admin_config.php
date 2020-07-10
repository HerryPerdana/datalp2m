 <?php require_once('../Connections/datalp2m.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "ubah")) {
	if ($_POST['password']!= $_POST['passwordmatch'])
 {
     echo " <script type='text/javascript'>alert('Password dan Confirm Password Berbeda');</script>";	
	 
 }else{
  $updateSQL = sprintf("UPDATE tb_admin SET username=%s, password=%s WHERE id_admin=%s",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['id_admin'], "int"));
					   
			
  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $updateSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

 
 if($_SESSION['jabatan'] == "Admin" ){
 echo " <script type='text/javascript'>alert('Password Berhasil Di Rubah'); location.href=\"../admin/profil_edit.php\";</script>";

  }else if($_SESSION['jabatan'] == "Staff"){
 echo " <script type='text/javascript'>alert('Password Berhasil Di Rubah'); location.href=\"../staff/profil_edit.php\";</script>";

  }
}
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "profil")) {
  $updateSQL = sprintf("UPDATE tb_admin SET nip=%s, nama_admin=%s, cp=%s,  alamat_admin=%s, foto=%s WHERE id_admin=%s",
                       GetSQLValueString($_POST['nip'], "int"),
                       GetSQLValueString($_POST['nama_admin'], "text"),
                       GetSQLValueString($_POST['cp'], "int"),
                       GetSQLValueString($_POST['alamat_admin'], "text"),
					   
                       GetSQLValueString($_FILES['foto']['name'], "text"),
                       GetSQLValueString($_POST['id_admin'], "int"));
					   
			
  mysqli_select_db( $datalp2m, $database_datalp2m);
  $Result1 = mysqli_query( $datalp2m, $updateSQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

 move_uploaded_file($_FILES['foto']['tmp_name'], '../images/profil/'.$_FILES['foto']['name']);


 if($_SESSION['jabatan'] == "Admin" ){
 echo " <script type='text/javascript'>alert('Profil Berhasil Di Rubah'); location.href=\"../admin/profil_edit.php\";</script>";

  }else if($_SESSION['jabatan'] == "Staff"){
 echo " <script type='text/javascript'>alert('Profil Berhasil Di Rubah'); location.href=\"../staff/profil_edit.php\";</script>";

  }
}


$query_admin = sprintf("SELECT * FROM tb_admin WHERE id_admin = %s", GetSQLValueString($_SESSION['id_admin'], "int"));
$admin = mysqli_query( $datalp2m, $query_admin) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row_admin = mysqli_fetch_assoc($admin);
$totalRows_admin = mysqli_num_rows($admin);

((mysqli_free_result($admin) || (is_object($admin) && (get_class($admin) == "mysqli_result"))) ? true : false);

?>
 
 <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#ubahpassword">Ubah Password</a>
                  </li>
                 
                  <li>
                    <a data-toggle="tab" href="#editprofil">Edit Profile</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                 
                  <div id="ubahpassword" class="tab-pane active">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Ubah Password</h4>
                        <form role="form" name="ubah" id="ubah" method="post" action="<?php echo $editFormAction; ?>" class="form-horizontal">
                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-6">
                              <input type="text" name="username" placeholder=" " id="c-name" class="form-control" required value="<?php echo $row_admin['username']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-6">
                              <input type="password" name="password" placeholder=" " id="lives-in" class="form-control" required value="<?php echo $row_admin['username']; ?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Ulangi Password</label>
                            <div class="col-lg-6">
                              <input type="password" name="passwordmatch" placeholder=" " id="lives-in" class="form-control" required>
                            </div>
                          </div>
                          
                           <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Save</button>
                              <button class="btn btn-theme04" type="button">Cancel</button>
                              
                               <input type="hidden" name="MM_update" value="ubah" />
   		 <input type="hidden" name="id_admin" value="<?php echo $row_admin['id_admin']; ?>" />
                            </div>
                          </div>
                         
                        </form>
                      </div>
                     
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  
                  <div id="editprofil" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Edit Profil</h4>
                        <form role="form"  name="profil" id="profil" method="post" action="<?php echo $editFormAction; ?>"  class="form-horizontal" enctype="multipart/form-data">
                          
                          <div class="form-group">
                  <label class="control-label col-lg-2">Upload Foto</label>
                  <div class="col-lg-6">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="foto" class="default" />
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                    </div>
                    </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">NIP</label>
                            <div class="col-lg-6">
                              <input type="text" name="nip" value="<?php echo htmlentities($row_admin['nip'], ENT_COMPAT, 'utf-8'); ?>" id="c-name" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nama</label>
                            <div class="col-lg-6">
                              <input type="text" name="nama_admin" required value="<?php echo htmlentities($row_admin['nama_admin'], ENT_COMPAT, 'utf-8'); ?>" id="lives-in" class="form-control">
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat</label>
                            <div class="col-lg-10">
                              <textarea rows="10" name="alamat_admin" required cols="30" class="form-control"><?php echo htmlentities($row_admin['alamat_admin'], ENT_COMPAT, 'utf-8'); ?></textarea>
                            </div>
                          </div>
                          
                           <div class="form-group">
                            <label class="col-lg-2 control-label">No. Handphone</label>
                            <div class="col-lg-6">
                              <input type="number" name="cp" required value="<?php echo htmlentities($row_admin['cp'], ENT_COMPAT, 'utf-8'); ?>" id="country" class="form-control">
                            </div>
                          </div>
                        
                          
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Save</button>
                              <button class="btn btn-theme04" type="button">Cancel</button>
                            </div>
                          </div>
                           <input type="hidden" name="MM_update" value="profil" />
   		 <input type="hidden" name="id_admin" value="<?php echo $row_admin['id_admin']; ?>" />
                        </form>
                      </div>
                     
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->