<?php

$content='<form method="post" name="register" action="/process.php">
	<div class="inform" id="inform">
		��� ���� ����������� ��� ����������
	</div>
	<table class="reg"><tr>
		<td class="lreg"><span id="emailLabel">��� E-mail</span>:&nbsp;</td>
		<td><input type="text" name="email" placeholder="������� E-mail" size=20 id="email" /> <span id="erremail"></span></td>
	</tr><tr>
		<td class="lreg"><span id="fnameLabel">���� ���</span>:&nbsp;</td>
		<td><input type="text" name="fname" placeholder="������� ���� ���" size=20 id="fname" /> <span id="errfname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="snameLabel">���� �������</span>:&nbsp;</td>
		<td><input type="text" name="sname" placeholder="������� �������" size=20 id="sname" /> <span id="errsname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="passwordLabel">���������� ������</span>:&nbsp;</td>
		<td><input type="password" name="password" placeholder="������� ������" size=20 id="password" /> 
			<span id="errpassword">�� ����� 8 ��������</span></td>
	</tr><tr>
		<td class="lreg"><span id="password2Label">������� ������ ��� ���</span>:&nbsp;</td>
		<td><input type="password" name="password2" placeholder="��������� ������" size=20 id="password2" /> <span id="errpassword2"></span></td>
	</tr><tr>
		<td class="lreg">&nbsp;</td>
		<td><input type="submit" name="submit" id="submit" value=" ����������� " disabled /></td>
	</tr><tr>
		<td class="lreg"><a href="#" class="lang" id="sel">RU</a></td>
		<td class="right"><a href="/" class="enter" id="link">��������� �� ����</a></td>
	</tr></table>
	<input type="hidden" name="language" id="lang" value="ru" />
	</form>';
	
$r='�';
$text='����������';
$title='�������� ������� - �����������';

require 'templ/reg.tpl';
		
?>