<?php

$marital='<select name="marital">';

if ($_SESSION['lang']=="en")
{
	$count[0]='Not specified';
	$count[1]='Married';
	$count[2]='Single';
	$count[3]='В браке не состою';
}
else
{
	$count[0]='Не определено';
	$count[1]='Женат / Замужем';
	$count[2]='В браке не состою';
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