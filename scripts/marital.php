<?php

$marital='<select name="marital">';

if ($_SESSION['lang']=="en")
{
	$count[0]='Not specified';
	$count[1]='Married';
	$count[2]='Single';
	$count[3]='� ����� �� ������';
}
else
{
	$count[0]='�� ����������';
	$count[1]='����� / �������';
	$count[2]='� ����� �� ������';
}

for ($i=0; $i<=2; $i++)
{
	if ($user_arr['marital']==$i)
		$sel='selected';
	else
		$sel='';
	$marital.='<option value="'.$i.'" '.$sel.'>'.$count[$i].'';
}

$marital.='</select>';

?>