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
	$count[0]='�� ���������';
	$count[1]='����� ����';
	$count[2]='1 ���';
	$count[3]='2 ����';
	$count[4]='3 ����';
	$count[5]='����� 3 ���';
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