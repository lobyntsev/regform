<?php

session_start();

$_SESSION['lang']='en';

if (!isset($_SESSION['id_user']))
	exit(header("Location: /"));
else
{
	require '../scripts/n_config.php';
	
	$title='Test task - Change image';
	$page='avatar.php';

	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("ќшибка");
	$user_arr=mysql_fetch_array($rc);
	
	require '../scripts/left.php';
	
	$content='Change image';
	
	if (!isset($_FILES['filename']))
	{
		$content.='<br /><br />To reduce the load on the server file size should not exceed <b>100 kilobytes</b>.<br />File format must be
			<b>JPG</b>, <b>JPEG</b>, <b>GIF</b>.<br /><br /><form enctype="multipart/form-data" method="post" name="file">
			<input type="file" name="filename" /><input type="submit" value=" Download " /></form>';
		//язык надписи на кнопке "ќбзор" зависит от €зыка системы пользовател€
		
		require '../templ/main_en.tpl';
	}
	else
	{
		$extention=array(".gif",".jpg",".jpeg");

		if($_FILES['filename']['size']>102400)
			$content.='The file has an invalid size.<br /><a href="/en/avatar.php" class="content">Back to send a file</a>';
		elseif(!in_array(strrchr($_FILES['filename']['name'],"."),$extention))
			$content.='The file has an invalid extension.<br /><a href="/en/avatar.php" class="content">Back to send a file</a>';
		elseif(copy($_FILES['filename']['tmp_name'], '../avatars/tmp/'.$_SESSION['id_user']))
		{

		switch($_FILES["filename"]["type"])
		{
			case "image/jpeg":
				$im = imagecreatefromjpeg ("../avatars/tmp/".$_SESSION['id_user']);
				$w=imagesx($im);
				$h=imagesy($im);
				$k=$w/$h;
				$h2=200/$k;
				$im2 = imagecreatetruecolor (200, $h2);
				imagecopyresampled($im2, $im, 0, 0, 0, 0, 200, $h2, $w, $h);
				imagejpeg($im2, "../avatars/".$_SESSION['id_user'], 100);		
				imagedestroy($im);		
				break;
			case "image/gif":
				$im = imagecreatefromgif ("../avatars/tmp/".$_SESSION['id_user']);
				$w=imagesx($im);
				$h=imagesy($im);
				$k=$w/$h;
				$h2=200/$k;
				$im2 = imagecreatetruecolor (200, $h2);
				imagecopyresampled($im2, $im, 0, 0, 0, 0, 200, $h2, $w, $h);
				imagegif($im2, "../avatars/".$_SESSION['id_user'], 100);		
				imagedestroy($im);		
				break;
		}
		
		@unlink("../avatars/tmp/".$_SESSION['id_user']);

		$query="UPDATE n_user SET avatar=1 WHERE id=$_SESSION[id_user]";
		if (mysql_query($query))
			$content.='<br /><br />The file is saved.<br /><br />';
		else
			$content.='<br /><br />Failed to send the file.<br />Try to change the image later.<br /><br />';	
		}
		
		$content.='There is redirected to the <a href="/en/profile.php" class="enter">profile page</a>.';
		
		require '../templ/main_en.tpl';
		
		echo '<meta http-equiv="refresh" content="2; url=/en/profile.php">';
	}
}

?>