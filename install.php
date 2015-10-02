<?php

// Этот файл удалить после установки

require('scripts/n_config.php');

$query="CREATE TABLE n_user (
	id INT UNSIGNED NOT NULL auto_increment,
	email TINYTEXT NOT NULL,
	password TINYTEXT NOT NULL,
	fname TINYTEXT NOT NULL,
	sname TINYTEXT NOT NULL,
	birth SMALLINT NOT NULL,
	location TINYTEXT NOT NULL,
	marital SMALLINT NOT NULL,
	education SMALLINT NOT NULL,
	experience SMALLINT NOT NULL,
	phone TINYTEXT NOT NULL,
	skype TINYTEXT NOT NULL,
	information TEXT NOT NULL,
	avatar SMALLINT NOT NULL,
	allfields SMALLINT NOT NULL,
	datetime datetime NOT NULL,
	PRIMARY KEY (id))";
if (!mysql_query($query))
	exit(mysql_error());

?>