<?php

session_start();

$_SESSION['lang']='ru';

if (!isset($_SESSION['id_user']))
	exit(header("Location: /"));
else
{
	require 'scripts/n_config.php';
	
	$title='Тестовое задание - Изменение изображения';
	$page='avatar.php';

	$query="SELECT * FROM n_user WHERE id='$_SESSION[id_user]'";
	$rc=mysql_query($query) or die("Ошибка");
	$user_arr=mysql_fetch_array($rc);
	
	require 'scripts/left.php';
	
	$content='Изменение изображения';
	
	if (!isset($_FILES['filename']))
	{
		$content.='<br /><br />Для уменьшения нагрузки на сервер размер файла не должен превышать <b>100 килобайт</b>.<br />Формат файла должен быть
		<b>JPG</b>, <b>JPEG</b>, <b>GIF</b>.<br /><br /><form enctype="multipart/form-data" method="post" name="file">
		<input type="file" name="filename" /><input type="submit" value=" Загрузить " /></form>';
		
		require 'templ/main.tpl';
	}
	else
	{
		$extention=array(".gif",".jpg",".jpeg");

		if($_FILES['filename']['size']>102400)
			$content.='Файл имеет недопустимый размер.<br /><a href="/avatar.php" class="content">Вернуться к отправке файла</a>';
		elseif(!in_array(strrchr($_FILES['filename']['name'],"."),$extention))
			$content.='Файл имеет недопустимое расширение.<br /><a href="/avatar.php" class="content">Вернуться к отправке файла</a>';
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
			$content.='<br /><br />Файл сохранен.<br /><br />';
		else
			$content.='<br /><br />Ошибка отправки файла.<br />Попробуйте изменить изображение позднее.<br /><br />';	
		}
		
		$content.='Идет перенаправление на <a href="/profile.php" class="enter">страницу профиля</a>.';
		
		require 'templ/main.tpl';
		
		echo '<meta http-equiv="refresh" content="2; url=/profile.php">';
	}
}

?>