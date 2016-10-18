<?php
require_once("connect.php");

$connect = mysql_connect($server,$username,$password) or die ( mysql_error() ); 
mysql_select_db($database, $connect);
?>