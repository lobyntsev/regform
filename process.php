<?php

$_POST['email']=trim($_POST['email']);
$_POST['fname']=trim($_POST['fname']);
$_POST['sname']=trim($_POST['sname']);
$_POST['password']=trim($_POST['password']);
$_POST['password2']=trim($_POST['password2']);

if (!get_magic_quotes_gpc())
{
	$_POST['email']=mysql_escape_string($_POST['email']);
	$_POST['fname']=mysql_escape_string($_POST['fname']);
	$_POST['sname']=mysql_escape_string($_POST['sname']);
	$_POST['password']=mysql_escape_string($_POST['password']);
	$_POST['password2']=mysql_escape_string($_POST['password2']);
	$_POST['language']=mysql_escape_string($_POST['language']);
}

require 'scripts/n_config.php';

$query="SELECT COUNT(*) FROM n_user WHERE email='$_POST[email]'";
$usr=mysql_query($query) or die("Ошибка");
if (mysql_result($usr, 0)>0)
	define("TOTAL", 1);
	
if (empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password2']) or empty($_POST['fname']) or empty($_POST['sname'])
	or defined("TOTAL") or !preg_match("|^[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}$|i", $_POST['email']) or $_POST['password']!==$_POST['password2'])
		echo '<html><body onLoad="document.forms[\'error\'].submit()">
			<form name="error" action="/correct.php" method="POST">
			<input type="hidden" name="email" size=30 value="'.$_POST['email'].'" />
			<input type="hidden" name="fname" size=40 value="'.$_POST['fname'].'" />
			<input type="hidden" name="sname" size=40 value="'.$_POST['sname'].'" />
			<input type="hidden" name="password" size=40 value="'.$_POST['password'].'" />
			<input type="hidden" name="password2" size=20 value="'.$_POST['password2'].'" />
			<input type="hidden" name="language" size=20 value="'.$_POST['language'].'" />
			</form></body></html>';
else
{
	$pass=md5($_POST['password'].$solt);
	
	$query="INSERT INTO n_user VALUES (NULL, '$_POST[email]', '$pass', '$_POST[fname]', '$_POST[sname]', 0, '', 0,
		0, 0, '', '', '', 0, 0, now())";
	if (mysql_query($query))
	{
		session_start();
	
		$query="SELECT id FROM n_user WHERE email='$_POST[email]'";
		$rc=mysql_query($query) or die("Ошибка");                                                                      
		$_SESSION['id_user']=mysql_result($rc, 0);
		
		if ($_POST['language']=="ru")
			header("Location: /profile.php");
		else
			header("Location: /en/profile.php");
	}
	else
	{
		if ($_POST['language']=='ru')
		{
			$register='<br />При регистрации произошла ошибка.<br /><br />Попробуйте зарегистрироваться позднее.<br /><br />
				<a href="/" class="enter" id="link">На главную страницу</a>';
			$r='Р';
			$text='егистрация';
			$title='Тестовое задание - Регистрация';
		}
		else
		{
			$register='<br />When you register an error occurred.<br /><br />Try to register later.<br /><br />
				<a href="/" class="enter" id="link">Home Page</a>';
			$r='R';
			$text='egistration';
			$title='Test task - Registration';
		}
	}
}

require 'templ/reg.tpl';

?>