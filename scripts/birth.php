<?php

$birth='<select name="birth">';

if ($_SESSION['lang']=="en")
	$birth.='<option value="0">Not specified';
else
	$birth.='<option value="0">Не определен';

for ($i=1980; $i<=2015; $i++)
{
	if ($user_arr['birth']==$i)
		$sel='selected';
	else
		$sel='';
	$birth.='<option value="'.$i.'" '.$sel.'>'.$i.'';
}

$birth.='</select>';

?>