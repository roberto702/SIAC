<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Local = "localhost";
$database_Local = "login";
$username_Local = "root";
$password_Local = "";
$Local = mysql_pconnect($hostname_Local, $username_Local, $password_Local) or trigger_error(mysql_error(),E_USER_ERROR); 
?>