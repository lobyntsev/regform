<?php

session_start();

if ($_SESSION['lang']=="ru")
	$url='Location: /';
else
	$url='Location: /en/';

session_destroy();

header($url);

?>