<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title id="title"><? echo $title; ?></title>
	<link rel="Stylesheet" href="/res/styles.css" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<script type="text/javascript" src="/res/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="/res/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="/res/checkform.js"></script>
</head>
<body>
<div class="reg">
	<div class="headblock">
		<span class="blue" id="blue"><? echo $r;?></span><span id="normal"><? echo $text; ?></span>
	</div>
	<div class="block">
		<?php echo $content; ?>
	</div>
</div>
</body>
</html>