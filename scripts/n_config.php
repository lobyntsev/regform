<?php

$solt='aK568vbDzp';

$dblocation='';
$dbname='';
$dbuser='';
$dbpasswd='';
$dbcnx=@mysql_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx)
exit('������ ���� ������ ����������');
if (!@mysql_select_db($dbname, $dbcnx))
exit('���� ������ ����������');
@mysql_query("SET NAMES 'cp1251'");

?>