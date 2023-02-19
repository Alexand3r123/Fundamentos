<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_prueba = "localhost";
$database_prueba = "practica";
$username_prueba = "root";
$password_prueba = "";
$prueba = mysql_pconnect($hostname_prueba, $username_prueba, $password_prueba) or trigger_error(mysql_error(),E_USER_ERROR); 
?>