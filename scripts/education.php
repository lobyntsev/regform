<?php

$education='<select name="education">';

if ($_SESSION['lang']=="en")
{
	$count[0]='Not specified';
	$count[1]='Basic';
	$count[2]='Secondary';
	$count[3]='Colledge';
	$count[4]='Higher';
	$count[5]='Academic';
}
else
{
	$count[0]='Не определено';
	$count[1]='Начальное';
	$count[2]='Среднее';
	$count[3]='Среднее специальное';
	$count[4]='Высшее';
	$count[5]='Ученая степень';
}

for ($i=0; $i<=5; $i++)
{
	if ($user_arr['education']==$i)
		$sel='selected';
	else
		$sel='';
	$education.='<option value="'.$i.'" '.$sel.'>'.$count[$i].'';
}

$education.='</select>';

?>