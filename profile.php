<?php

session_start();

$_SESSION['lang']='ru';

if (!isset($_SESSION['id_user']))
	exit(header("Location: /"));
else
{
	require 'scripts/n_config.php';

	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("������");
	$user_arr=mysql_fetch_array($rc);
	
	require 'scripts/birth.php';
	require 'scripts/marital.php';
	require 'scripts/education.php';
	require 'scripts/experience.php';
	
	require 'scripts/left.php';
	
	$title='�������� ������� - �������';
	$page='profile.php';
	
	if ($user_arr['allfields']!=1)
		$content='<span class="red">��� ����������� ������������� ���� ������� ����� ��� ���������� ��������� ���� �������</span><br /><br />';

	if (!isset($_POST['fname']) or !isset($_POST['sname'])  or !isset($_POST['birth'])  or !isset($_POST['location']) or !isset($_POST['marital'])
		or !isset($_POST['education']) or !isset($_POST['experience']) or !isset($_POST['phone'])  or !isset($_POST['skype'])
		or !isset($_POST['information']))
	{
			$content.='<form method="post" name="profile">
				<table class="reg"><tr>
					<td class="lprof">��� E-mail:&nbsp;</td>
					<td>'.$user_arr['email'].'</td>
				</tr><tr>
					<td class="lprof">���� ���:&nbsp;</td>
					<td><input type="text" name="fname" placeholder="������� ���� ���" size=30 value="'.$user_arr['fname'].'" /></span></td>
				</tr><tr>
					<td class="lprof">���� �������:&nbsp;</td>
					<td><input type="text" name="sname" placeholder="������� �������" size=30 value="'.$user_arr['sname'].'" /></td>
				</tr><tr>
					<td class="lprof">��� ��������:&nbsp;</td>
					<td>'.$birth.'</td>
				</tr><tr>
					<td class="lprof">����� ����������:&nbsp;</td>
					<td><input type="text" name="location" placeholder="������� ����� ����������" size=30 value="'.$user_arr['location'].'" /></td>
				</tr><tr>
					<td class="lprof">�������� ���������:&nbsp;</td>
					<td>'.$marital.'</td>
				</tr><tr>
					<td class="lprof">�����������:&nbsp;</td>
					<td>'.$education.'</td>
				</tr><tr>
					<td class="lprof">���� ������:&nbsp;</td>
					<td>'.$experience.'</td>
				</tr><tr>
					<td class="lprof">�������:&nbsp;</td>
					<td><input type="text" name="phone" placeholder="������� ����� ��������" size=30 value="'.$user_arr['phone'].'" /></td>
				</tr><tr>
					<td class="lprof">Skype:&nbsp;</td>
					<td><input type="text" name="skype" placeholder="������� skype" size=30 value="'.$user_arr['skype'].'" /></td>
				</tr><tr>
					<td class="lprof">�������������� ��������:&nbsp;</td>
					<td><textarea name="information" rows="12" cols="60"  class="padding">'.$user_arr['information'].'</textarea></td>
				</tr><tr>
					<td class="lprof">&nbsp;</td>
					<td><input type="submit" name="submit" id="submit" value=" ��������� " /></td>
				</tr></table>
				</form>';
				
		require 'templ/main.tpl';
	}
	else
	{
		$_POST['fname']=trim($_POST['fname']);
		$_POST['sname']=trim($_POST['sname']);
		$_POST['birth']=trim($_POST['birth']);
		$_POST['location']=trim($_POST['location']);
		$_POST['marital']=trim($_POST['marital']);
		$_POST['education']=trim($_POST['education']);
		$_POST['experience']=trim($_POST['experience']);
		$_POST['phone']=trim($_POST['phone']);
		$_POST['skype']=trim($_POST['skype']);
		$_POST['information']=trim($_POST['information']);
		
		if (!get_magic_quotes_gpc())
		{
			$_POST['fname']=mysql_escape_string($_POST['fname']);
			$_POST['sname']=mysql_escape_string($_POST['sname']);
			$_POST['birth']=mysql_escape_string($_POST['birth']);
			$_POST['location']=mysql_escape_string($_POST['location']);
			$_POST['marital']=mysql_escape_string($_POST['marital']);
			$_POST['education']=mysql_escape_string($_POST['education']);
			$_POST['experience']=mysql_escape_string($_POST['experience']);
			$_POST['phone']=mysql_escape_string($_POST['phone']);
			$_POST['skype']=mysql_escape_string($_POST['skype']);
			$_POST['information']=mysql_escape_string($_POST['information']);
		}
		
		if (!preg_match("|^[\d]+$|", $_POST['birth']))
			$_POST['birth']=0;
			
		if (!preg_match("|^[\d]+$|", $_POST['marital']))
			$_POST['marital']=0;
			
		if (!preg_match("|^[\d]+$|", $_POST['education']))
			$_POST['education']=0;
			
		if (!preg_match("|^[\d]+$|", $_POST['experience']))
			$_POST['experience']=0;
			
		if (!empty($_POST['fname']) and !empty($_POST['sname']) and $_POST['birth']!==0 and !empty($_POST['location']) and $_POST['marital']!==0
			and $_POST['education']!==0 and $_POST['experience']!==0 and !empty($_POST['phone']) and !empty($_POST['skype']) and 
			!empty($_POST['information']))
				$all=1;
		else
			$all=0;
			
		$query="UPDATE n_user SET fname='$_POST[fname]', sname='$_POST[sname]', birth='$_POST[birth]', location='$_POST[location]',
			marital='$_POST[marital]', education='$_POST[education]', experience='$_POST[experience]', phone='$_POST[phone]',
			skype='$_POST[skype]', information='$_POST[information]', allfields=$all WHERE id=$_SESSION[id_user]";
					if (mysql_query($query))
						$content.='<br />������� ��������������.<br /><br />';
					else
						$content.='<br />��� �������������� ������� ��������� ������.<br /><br />
							���������� ��������������� ������� �������.<br /><br />';
							
		$content.='���� ��������������� �� <a href="/profile.php" class="enter">�������� �������</a>.';
		
		require 'templ/main.tpl';
		
		echo '<meta http-equiv="refresh" content="2; url=/profile.php">';
	}
}

?>