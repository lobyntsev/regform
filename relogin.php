<?php

// ������������� ���� � ��������� �� �������
// ��� ����������� ������� ���������� �� �������

session_start();

if ($_SESSION['lang']=="ru")
{
$content='<center><br />������������ ����� ��� ������.<br /><br />���� ���������������<br />
	<a href="/" class="enter">�� �������</a> ��������.</center><br /><br />';
	
$r='�';
$text='��� �� ����';
$title='�������� ������� - ���� �� ����';
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