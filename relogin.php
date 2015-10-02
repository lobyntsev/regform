<?php

// Промежуточный файл с задержкой по времени
// для затруднения подбора брутфорсом по словарю

session_start();

if ($_SESSION['lang']=="ru")
{
$content='<center><br />Неправильный логин или пароль.<br /><br />Идет перенаправление<br />
	<a href="/" class="enter">на главную</a> страницу.</center><br /><br />';
	
$r='В';
$text='ход на сайт';
$title='Тестовое задание - Вход на сайт';
$url='/';
}
else
{
$content='<center><br />Wrong login or password.<br /><br />There is a redirect to the<br />
	<a href="/en/" class="enter">home</a> page.</center><br /><br />';
	
$r='L';
$text='ogin to the site';
$title='Test task - Login to the site';
$url='/en/';
}

session_destroy();

require 'templ/reg.tpl';

echo '<meta http-equiv="refresh" content="2; url='.$url.'">';

?>