<?php

$content='<form method="post" name="register" action="/process.php">
	<div class="inform" id="inform">
		All fields are required
	</div>
	<table class="reg"><tr>
		<td class="lreg"><span id="emailLabel">Your E-mail</span>:&nbsp;</td>
		<td><input type="text" name="email" placeholder="Enter your E-mail" size=20 id="email" /> <span id="erremail"></span></td>
	</tr><tr>
		<td class="lreg"><span id="fnameLabel">Your name</span>:&nbsp;</td>
		<td><input type="text" name="fname" placeholder="Enter your name" size=20 id="fname" /> <span id="errfname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="snameLabel">Your last name</span>:&nbsp;</td>
		<td><input type="text" name="sname" placeholder="Enter last name" size=20 id="sname" /> <span id="errsname"></span></td>
	</tr><tr>
		<td class="lreg"><span id="passwordLabel">Create password</span>:&nbsp;</td>
		<td><input type="password" name="password" placeholder="Create password" size=20 id="password" /> 
			<span id="errpassword">at least 8 characters</span></td>
	</tr><tr>
		<td class="lreg"><span id="password2Label">Enter the password again</span>:&nbsp;</td>
		<td><input type="password" name="password2" placeholder="Repeat password" size=20 id="password2" /> <span id="errpassword2"></span></td>
	</tr><tr>
		<td class="lreg">&nbsp;</td>
		<td><input type="submit" name="submit" id="submit" value=" Registration " disabled /></td>
	</tr><tr>
		<td class="lreg"><a href="#" class="lang" id="sel">EN</a></td>
		<td class="right"><a href="/en/" class="enter" id="link">Return to the site</a></td>
	</tr></table>
	<input type="hidden" name="language" id="lang" value="en" />
	</form>';
	
$r='R';
$text='egistration';
$title='Test task - Registration';

require '../templ/reg.tpl';
		
?>