<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title><? echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251" />
	<meta name="Author" content="Вадим" />
	<link rel="Stylesheet" href="/res/styles.css" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
	<div class="header">
		Тестовое задание
		<div class="lang">
			RU / <a href="/en/<?php echo $page; ?>" class="enter">EN</a>
		</div>
	</div>
	<div class="main">
		<div class="left">
			<? echo $enter; ?>
		</div>
		<div class="right">
			<? echo $content; ?>
		</div>
	</div>
	<div class="footer">
		&copy; 2015 <a href="/" class="footer">Главная</a>
	</div>
</body>
</html>