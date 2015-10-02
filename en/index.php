<?php

session_start();

$_SESSION['lang']='en';

require '../scripts/n_config.php';

if (isset($_SESSION['id_user']))
{
	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("Îøèáêà");
	$user_arr=mysql_fetch_array($rc);
	
	require '../scripts/left.php';
}
else
{
	$enter='<div class="headleft"><span class="blue">L</span>ogin</div>
		<form method="post" name="register" action="/enter.php">
			<table class="reg"><tr>
				<td class="lreg">E-mail:&nbsp;</td>
				<td><input type="text" name="email" placeholder="Enter your E-mail" size=20 /></td>
			</tr><tr>
				<td class="lreg">Password:&nbsp;</td>
				<td><input type="password" name="password" placeholder="Enter password" size=20 /></td>
			</tr><tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value=" Login " /></td>
			</tr><tr>
				<td>&nbsp;</td>
				<td class="right"><a href="/en/reg.php" class="enter">Registration</a></td>
			</tr></table>
		</form>';
}

$title='Test task';

require '../templ/main_en.tpl';

?>