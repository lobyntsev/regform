<?php

session_start();

if (isset($_SESSION['id_user']))
	header("Location: /");
else
{
	$_POST['email']=trim($_POST['email']);
	$_POST['password']=trim($_POST['password']);
	
	if (!get_magic_quotes_gpc())
	{
		$_POST['email']=mysql_escape_string($_POST['email']);
		$_POST['password']=mysql_escape_string($_POST['password']);
	}
	
	require 'scripts/n_config.php';
	
	$pass=md5($_POST['password'].$solt);
	$query="SELECT COUNT(*) FROM n_user WHERE email='$_POST[email]' AND password='$pass'";
	$usr=mysql_query($query) or die("Ошибка");
	if (mysql_result($usr, 0)>0)
		define("TOTAL", 1);
		
	if (defined("TOTAL"))
		{
			$query="SELECT id FROM n_user WHERE email='$_POST[email]'";
			$usr=mysql_query($query) or die("Ошибка");
			$_SESSION['id_user']=mysql_result($usr, 0);
			
			if ($_SESSION['lang']=="ru")
				header("Location: /profile.php");
			else
				header("Location: /en/profile.php");
		}
		else
			exit(header("Location: /relogin.php"));
}

?>