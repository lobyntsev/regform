<?

if ($_POST['language']=='ru')
{
	$data['lang']='ru';
	$data['sel']='RU';
	$data['link']='Вернуться на сайт';
	$title='Тестовое задание - Регистрация';
	$r='Р';
	$text='егистрация';
	$data['mess']='Все поля обязательны для заполнения';
	$data['labelemail']='Ваш E-mail';
	$data['labelfname']='Ваше имя';
	$data['labelsname']='Ваша фамилия';
	$data['labelpassword']='Придумайте пароль';
	$data['labelpassword2']='Ведите пароль еще раз';
	$data['placeemail']='Ведите E-mail';
	$data['placefname']='Введите свое имя';
	$data['placesname']='Введите фамилию';
	$data['placepassword']='Введите пароль';
	$data['placepassword2']='Повторите пароль';
	$data['submit']=' Регистрация ';
	$data['erremail']='Неверный формат E-mail';
	$data['errpass']='Пароль менее 8 символов';
	$data['errpass2']='Пароли не совпадают';
	$data['errfname']='Не введено имя';
	$data['errsname']='Не введена фамилия';
	$data['busyemail']='E-mail занят';
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