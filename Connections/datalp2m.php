<?php
# FileName="Connection_php_mysql.htm"
# Type="mysql"
# HTTP="true"
$hostname_datalp2m = "localhost";
$database_datalp2m = "db_lp2m";
$username_datalp2m = "root";
$password_datalp2m = "";
$datalp2m = ($GLOBALS["___mysqli_ston"] = mysqli_connect($hostname_datalp2m,  $username_datalp2m,  $password_datalp2m, $database_datalp2m)) or trigger_error(mysqli_error($GLOBALS["___mysqli_ston"]),E_USER_ERROR); 
?>