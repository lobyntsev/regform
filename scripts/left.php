<?php

if ($user_arr['avatar']!=0)
	$avatar=$user_arr['id'];
else
	$avatar=0;

if ($_SESSION['lang']=="en")
	$enter=$user_arr['fname'].' '.$user_arr['sname'].'&nbsp;&nbsp;&nbsp;&nbsp;<a href="/en/profile.php" class="enter">profile</a> 
		<a href="/logout.php" class="out">Logout</a><br /><br /><img src="/avatars/'.$avatar.'" /><br />
		<a href="/en/avatar.php" class="enter">Change image</a>';
else
	$enter=$user_arr['fname'].' '.$user_arr['sname'].'&nbsp;&nbsp;&nbsp;&nbsp;<a href="/profile.php" class="enter">профиль</a> 
		<a href="/logout.php" class="out">Выход</a><br /><br /><img src="/avatars/'.$avatar.'" /><br />
		<a href="/avatar.php" class="enter">Изменить изображение</a>';

?>