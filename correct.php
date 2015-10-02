<?php

// На случай, если будет произведена подмена данных,
// или произойдет сбой в передаче данных

if (!get_magic_quotes_gpc())
{
	$_POST['email']=mysql_escape_string($_POST['email']);
	$_POST['fname']=mysql_escape_string($_POST['fname']);
	$_POST['sname']=mysql_escape_string($_POST['sname']);
	$_POST['password']=mysql_escape_string($_POST['password']);
	$_POST['password2']=mysql_escape_string($_POST['password2']);
	$_POST['language']=mysql_escape_string($_POST['language']);
}

require 'scripts/constants.php';

require 'scripts/n_config.php';

$query="SELECT COUNT(*) FROM n_user WHERE email='$_POST[email]'";
$usr=mysql_query($query) or die("Ошибка");
if (mysql_result($usr, 0)>0)
	define("TOTAL", 1);

if (!preg_match("|^[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}$|i", $_POST['email']) or empty($_POST['email']))
{
	$erremail=$data['erremail'];
	$classemail='class="inputRed"';
}
if ($_POST['password']!==$_POST['password2'] or empty($_POST['password2']))
{
	$errpassword2=$data['errpass2'];
	$classpass='class="inputRed"';
	$classpass2='class="inputRed"';
}
if (empty($_POST['password']))
{
	$errpassword=$data['errpass'];
	$classpass='class="inputRed"';
}
if (empty($_POST['fname']))
{
	$errfname=$data['errfname'];
	$classfname='class="inputRed"';
}
if (empty($_POST['sname']))
{
	$errsname=$data['errsname'];
	$classsname='class="inputRed"';
}	
if (defined("TOTAL"))
{
	$erremail=$data['busyemail'];
	$classemail='class="inputRed"';
}

$content='<form method="post" name="register" action="/process.php">
	<div class="inform" id="inform">'.$data['mess'].'</div>
	<table class="reg"><tr>
		<td class="lreg"><span id="emailLabel">'.$data['labelemail'].'</span>:&nbsp;</td>
		<td><input type="text" name="email" placeholder="'.$data['placeemail'].'" value="'.$_POST['email'].'" '.$classemail.' size=20 id="email" /> 
			<span class="red" id="erremail">'.$erremail.'</span></td>
	</tr><tr>
		<td class="lreg"><span id="fnameLabel">'.$data['labelfname'].'</span>:&nbsp;</td>
		<td><input type="text" name="fname" placeholder="'.$data['placefname'].'" value="'.$_POST['fname'].'" '.$classfname.' size=20 id="fname" /> 
			<span class="red" id="errfname">'.$errfname.'</span></td>
	</tr><tr>
		<td class="lreg"><span id="snameLabel">'.$data['labelsname'].'</span>:&nbsp;</td>
		<td><input type="text" name="sname" placeholder="'.$data['placesname'].'" value="'.$_POST['sname'].'" '.$classsname.' size=20 id="sname" /> 
			<span class="red" id="errsname">'.$errsname.'</span></td>
	</tr><tr>
		<td class="lreg"><span id="passwordLabel">'.$data['labelpassword'].'</span>:&nbsp;</td>
		<td><input type="password" name="password" placeholder="'.$data['placepassword'].'" '.$classpass.' size=20 id="password" /> 
			<span class="red" id="errpassword">'.$errpassword.'</span></td>
	</tr><tr>
		<td class="lreg"><span id="password2Label">'.$data['labelpassword2'].'</span>:&nbsp;</td>
		<td><input type="password" name="password2" placeholder="'.$data['placepassword2'].'" '.$classpass2.' size=20 id="password2" /> 
			<span class="red" id="errpassword2">'.$errpassword2.'</span></td>
	</tr><tr>
		<td class="lreg">&nbsp;</td>
		<td><input type="submit" name="submit" id="submit" value="'.$data['submit'].'" disabled /></td>
	</tr><tr>
		<td class="lreg"><a href="#" class="lang" id="sel">'.$data['sel'].'</a></td>
		<td class="right"><a href="/" class="enter" id="link">'.$data['link'].'</a></td>
	</tr></table>
	<input type="hidden" name="language" id="lang" value="'.$data['lang'].'" />
	</form>';

require 'templ/reg.tpl';

?>