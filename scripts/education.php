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
	$count[0]='�� ����������';
	$count[1]='���������';
	$count[2]='�������';
	$count[3]='������� �����������';
	$count[4]='������';
	$count[5]='������ �������';
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