<?php

$experience='<select name="experience">';

if ($_SESSION['lang']=="en")
{
	$count[0]='Not specified';
	$count[1]='Less 1 year';
	$count[2]='1 year';
	$count[3]='2 years';
	$count[4]='3 years';
	$count[5]='Least 3 years';
}
else
{
	$count[0]='Не определен';
	$count[1]='Менее года';
	$count[2]='1 год';
	$count[3]='2 года';
	$count[4]='3 года';
	$count[5]='Более 3 лет';
}

for ($i=0; $i<=5; $i++)
{
	if ($user_arr['experience']==$i)
		$sel='selected';
	else
		$sel='';
	$experience.='<option value="'.$i.'" '.$sel.'>'.$count[$i].'';
}

$experience.='</select>';

?>