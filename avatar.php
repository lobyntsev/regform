<?php

session_start();

$_SESSION['lang']='ru';

if (!isset($_SESSION['id_user']))
	exit(header("Location: /"));
else
{
	require 'scripts/n_config.php';
	
	$title='�������� ������� - ��������� �����������';
	$page='avatar.php';

	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("������");
	$user_arr=mysql_fetch_array($rc);
	
	require 'scripts/left.php';
	
	$content='��������� �����������';
	
	if (!isset($_FILES['filename']))
	{
		$content.='<br /><br />��� ���������� �������� �� ������ ������ ����� �� ������ ��������� <b>100 ��������</b>.<br />������ ����� ������ ����
		<b>JPG</b>, <b>JPEG</b>, <b>GIF</b>.<br /><br /><form enctype="multipart/form-data" method="post" name="file">
		<input type="file" name="filename" /><input type="submit" value=" ��������� " /></form>';
		
		require 'templ/main.tpl';
	}
	else
	{
		$extention=array(".gif",".jpg",".jpeg");

		if($_FILES['filename']['size']>102400)
			$content.='���� ����� ������������ ������.<br /><a href="/avatar.php" class="content">��������� � �������� �����</a>';
		elseif(!in_array(strrchr($_FILES['filename']['name'],"."),$extention))
			$content.='���� ����� ������������ ����������.<br /><a href="/avatar.php" class="content">��������� � �������� �����</a>';
		elseif(copy($_FILES['filename']['tmp_name'], 'avatars/tmp/'.$_SESSION['id_user']))
		{

		switch($_FILES["filename"]["type"])
		{
			case "image/jpeg":
				$im = imagecreatefromjpeg ("avatars/tmp/".$_SESSION['id_user']);
				$w=imagesx($im);
				$h=imagesy($im);
				$k=$w/$h;
				$h2=200/$k;
				$im2 = imagecreatetruecolor (200, $h2);
				imagecopyresampled($im2, $im, 0, 0, 0, 0, 200, $h2, $w, $h);
				imagejpeg($im2, "avatars/".$_SESSION['id_user'], 100);		
				imagedestroy($im);		
				break;
			case "image/gif":
				$im = imagecreatefromgif ("avatars/tmp/".$_SESSION['id_user']);
				$w=imagesx($im);
				$h=imagesy($im);
				$k=$w/$h;
				$h2=200/$k;
				$im2 = imagecreatetruecolor (200, $h2);
				imagecopyresampled($im2, $im, 0, 0, 0, 0, 200, $h2, $w, $h);
				imagegif($im2, "avatars/".$_SESSION['id_user'], 100);		
				imagedestroy($im);		
				break;
		}
		
		@unlink("avatars/tmp/".$_SESSION['id_user']);

		$query="UPDATE n_user SET avatar=1 WHERE id=$_SESSION[id_user]";
		if (mysql_query($query))
			$content.='<br /><br />���� ��������.<br /><br />';
		else
			$content.='<br /><br />������ �������� �����.<br />���������� �������� ����������� �������.<br /><br />';	
		}
		
		$content.='���� ��������������� �� <a href="/profile.php" class="enter">�������� �������</a>.';
		
		require 'templ/main.tpl';
		
		echo '<meta http-equiv="refresh" content="2; url=/profile.php">';
	}
}

?>