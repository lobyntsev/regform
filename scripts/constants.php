<?

if ($_POST['language']=='ru')
{
	$data['lang']='ru';
	$data['sel']='RU';
	$data['link']='��������� �� ����';
	$title='�������� ������� - �����������';
	$r='�';
	$text='����������';
	$data['mess']='��� ���� ����������� ��� ����������';
	$data['labelemail']='��� E-mail';
	$data['labelfname']='���� ���';
	$data['labelsname']='���� �������';
	$data['labelpassword']='���������� ������';
	$data['labelpassword2']='������ ������ ��� ���';
	$data['placeemail']='������ E-mail';
	$data['placefname']='������� ���� ���';
	$data['placesname']='������� �������';
	$data['placepassword']='������� ������';
	$data['placepassword2']='��������� ������';
	$data['submit']=' ����������� ';
	$data['erremail']='�������� ������ E-mail';
	$data['errpass']='������ ����� 8 ��������';
	$data['errpass2']='������ �� ���������';
	$data['errfname']='�� ������� ���';
	$data['errsname']='�� ������� �������';
	$data['busyemail']='E-mail �����';
}
else
{
	$data['lang']='en';
	$data['sel']='EN';
	$data['link']='Return to the site';
	$title='Test task - Registration';
	$r='R';
	$text='egistration';
	$data['mess']='All fields are required';
	$data['labelemail']='Your E-mail';
	$data['labelfname']='Your name';
	$data['labelsname']='Your last name';
	$data['labelpassword']='Create password';
	$data['labelpassword2']='Enter the password again';
	$data['placeemail']='Enter your E-mail';
	$data['placefname']='Enter your name';
	$data['placesname']='Enter last name';
	$data['placepassword']='Enter password';
	$data['placepassword2']='Repeat password';
	$data['submit']=' Registration ';
	$data['erremail']='Wrong format E-mail';
	$data['errpass']='At least 8 characters';
	$data['errpass2']='Passwords are different';
	$data['errfname']='Do not enter a name';
	$data['errsname']='Do not enter a last name';
	$data['busyemail']='E-mail busy';
}

?>