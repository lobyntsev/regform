<?php

session_start();

$_SESSION['lang']='ru';

require 'scripts/n_config.php';

if (isset($_SESSION['id_user']))
{
	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("Ошибка");
	$user_arr=mysql_fetch_array($rc);
	
	require 'scripts/left.php';
}
else
{
	$enter='<div class="headleft"><span class="blue">А</span>вторизация</div>
		<form method="post" name="register" action="/enter.php">
			<table class="reg"><tr>
				<td class="lreg">E-mail:&nbsp;</td>
				<td><input type="text" name="email" placeholder="Введите E-mail" size=20 /></td>
			</tr><tr>
				<td class="lreg">Пароль:&nbsp;</td>
				<td><input type="password" name="password" placeholder="Введите пароль" size=20 /></td>
			</tr><tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value=" Вход " /></td>
			</tr><tr>
				<td>&nbsp;</td>
				<td class="right"><a href="/reg.php" class="enter">Регистрация</a></td>
			</tr></table>
		</form>';
}

$title='Тестовое задание';

require 'templ/main.tpl';

?>