<?php

if (!get_magic_quotes_gpc())
	$_GET['email']=mysql_escape_string($_GET['email']);

require 'n_config.php';

$query="SELECT COUNT(*) FROM n_user WHERE email='$_GET[email]'";
$usr=mysql_query($query) or die("Ошибка");
if (mysql_result($usr, 0)>0)
	define("TOTAL", 1);

if(defined("TOTAL"))
	echo "no";
else
	echo "yes";

?>