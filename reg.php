<?php

$content='<form method="post" name="register" action="/process.php">
	<div class="inform" id="inform">
		Все поля обязательны для заполнения
	</div>
	<table class="reg"><tr>
		<td class="lreg"><span id="emailLabel">Ваш E-mail</span>:&nbsp;</td>
		<td><input type="text" name="email" placeholder="Введите E-mail" size=20 id="email" /> <span id="erremail"></span></td>
	</tr><tr>
		<td class="lreg"><span id="fnameLabel">Ваше имя</span>:&nbsp;</td>
		<td><input type="text" name="fname" placeholder="Введите свое имя" size=20 id="fname" /> <span id="errfname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="snameLabel">Ваша фамилия</span>:&nbsp;</td>
		<td><input type="text" name="sname" placeholder="Введите фамилию" size=20 id="sname" /> <span id="errsname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="passwordLabel">Придумайте пароль</span>:&nbsp;</td>
		<td><input type="password" name="password" placeholder="Введите пароль" size=20 id="password" /> 
			<span id="errpassword">не менее 8 символов</span></td>
	</tr><tr>
		<td class="lreg"><span id="password2Label">Введите пароль еще раз</span>:&nbsp;</td>
		<td><input type="password" name="password2" placeholder="Повторите пароль" size=20 id="password2" /> <span id="errpassword2"></span></td>
	</tr><tr>
		<td class="lreg">&nbsp;</td>
		<td><input type="submit" name="submit" id="submit" value=" Регистрация " disabled /></td>
	</tr><tr>
		<td class="lreg"><a href="#" class="lang" id="sel">RU</a></td>
		<td class="right"><a href="/" class="enter" id="link">Вернуться на сайт</a></td>
	</tr></table>
	<input type="hidden" name="language" id="lang" value="ru" />
	</form>';
	
$r='Р';
$text='егистрация';
$title='Тестовое задание - Регистрация';

require 'templ/reg.tpl';
		
?>