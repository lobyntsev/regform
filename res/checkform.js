var	email,
	password,
	password2,
	fname,
	sname,
	emailStat,
	passwordStat,
	password2Stat,
	fnameStat,
	snameStat,
	lang,
	errEmail,
	busyEmail,
	errFname,
	errSname,
	errPassword,
	errPassword2;

$(function() {
	lang = $("#lang").val();
	if(lang == "en"){
		errEmail = "Wrong format E-mail";
		busyEmail = "E-mail busy";
		errFname = "Do not enter a name";
		errSname = "Do not enter a last name";
		errPassword = "At least 8 characters";
		errPassword2 = "Passwords are different";
	}else{
		errEmail = "�������� ������ E-mail";
		busyEmail = "E-mail �����";
		errFname = "�� ������� ���";
		errSname = "�� ������� �������";
		errPassword = "������ ����� 8 ��������";
		errPassword2 = "������ �� ���������";
	}

	// Email
	$("#email").change(function(){
		email = $("#email").val();
		var expEmail = /[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}/i;
		var resEmail = email.search(expEmail);
		if(resEmail == -1){
			$("#email").next().hide().text(errEmail).css("color","red").fadeIn(400);
			$("#email").removeClass().addClass("inputRed");
			emailStat = 0;
			buttonOnAndOff();
		}else{			
			$.ajax({
			url: "/scripts/checkform.php",
			type: "GET",
			data: "email=" + email,
			cache: false,			
			success: function(response){
				if(response == "no"){
					$("#email").next().hide().text(busyEmail).css("color","red").fadeIn(400);
					$("#email").removeClass().addClass("inputRed");
					emailStat = 0;
					buttonOnAndOff();
				}else{					
					$("#email").removeClass().addClass("inputGreen");
					$("#email").next().text("");
					emailStat = 1;
					buttonOnAndOff();
				}					
			}
		});
		}
		
	});	
	$("#email").keyup(function(){
		$("#email").removeClass();
		$("#email").next().text("");
	});	
	
	
	//������
	$("#password").change(function(){
		password = $("#password").val();
		if(password.length < 8){
			$("#password").next().hide().text(errPassword).css("color","red").fadeIn(400);
			$("#password").removeClass().addClass("inputRed");
			passwordStat = 0;
			buttonOnAndOff();
		}else{
			$("#password").removeClass().addClass("inputGreen");
			$("#password").next().text("");
			passwordStat = 1;
			buttonOnAndOff();
		}		
	});
	$("#password").keyup(function(){
		password = $("#password").val();
		password2 = $("#password2").val();
		if(password.length > 7){
			passwordStat = 1;
			$("#password").removeClass();
			$("#password").next().text("");
			buttonOnAndOff();
		}else{
			passwordStat = 0;
			$("#password").next().hide().text(errPassword).css("color","red").fadeIn(400);
			$("#password").removeClass().addClass("inputRed");
			buttonOnAndOff();
		};
		if(password == password2){
			password2Stat = 1;
			$("#password2").removeClass();
			$("#password2").next().text("");
			buttonOnAndOff();
		}else{
			password2Stat = 0;
			$("#password2").next().hide().text(errPassword2).css("color","red").fadeIn(400);
			$("#password2").removeClass().addClass("inputRed");
			buttonOnAndOff();
		};
	});
	
	//���
	$("#fname").change(function(){
		fname = $("#fname").val();
		if(fname.length < 1){
			$("#fname").next().hide().text(errFname).css("color","red").fadeIn(400);
			$("#fname").removeClass().addClass("inputRed");
			fnameStat = 0;
			buttonOnAndOff();
		}else{
			$("#fname").removeClass().addClass("inputGreen");
			$("#fname").next().text("");
			fnameStat = 1;
			buttonOnAndOff();
		}		
	});
	$("#fname").keyup(function(){
		fname = $("#fname").val();
		if(fname.length > 0){
			fnameStat = 1;
			$("#fname").removeClass();
			$("#fname").next().text("");
			buttonOnAndOff();
		}else{
			fnameStat = 0;
			buttonOnAndOff();
		}
	});
	
	//�������
	$("#sname").change(function(){
		sname = $("#sname").val();
		if(sname.length < 1){
			$("#sname").next().hide().text(errSname).css("color","red").fadeIn(400);
			$("#sname").removeClass().addClass("inputRed");
			snameStat = 0;
			buttonOnAndOff();
		}else{
			$("#sname").removeClass().addClass("inputGreen");
			$("#sname").next().text("");
			snameStat = 1;
			buttonOnAndOff();
		}		
	});
	$("#sname").keyup(function(){
		sname = $("#sname").val();
		if(sname.length > 0){
			snameStat = 1;
			$("#sname").removeClass();
			$("#sname").next().text("");
			buttonOnAndOff();
		}else{
			snameStat = 0;
			buttonOnAndOff();
		}
	});
	
	//�������� ������
	$("#password2").change(function(){
		if(password2 != password){
			$("#password2").next().hide().text(errPassword2).css("color","red").fadeIn(400);
			$("#password2").removeClass().addClass("inputRed");
			password2Stat = 0;
			buttonOnAndOff();
		}else{
			$("#password2").removeClass().addClass("inputGreen");
			$("#password2").next().text("");
		}		
	});
	$("#password2").keyup(function(){
		password2 = $("#password2").val();
		if(password2 == password){
			password2Stat = 1;
			$("#password2").removeClass();
			$("#password2").next().text("");
			buttonOnAndOff();
		}else{
			$("#password2").next().hide().text(errPassword2).css("color","red").fadeIn(400);
			$("#password2").removeClass().addClass("inputRed");
			password2Stat = 0;
			buttonOnAndOff();
		}
	});
	//����� ����� ����������
	$("#sel").click(function(){
		sel = $("#sel").text();
		erremail = $("#erremail").text();
		errfname = $("#errfname").text();
		errsname = $("#errsname").text();
		errpassword = $("#errpassword").text();
		errpassword2 = $("#errpassword2").text();
		$('input[placeholder], textarea[placeholder]').placeholder();
		if(sel == "RU"){
			$("#lang").val("en");
			$("#sel").text("EN");
			$("#title").text("Test task - Registration");
			$("#blue").text("R");
			$("#normal").text("egistration");
			$("#inform").text("All fields are required");
			$("#emailLabel").text("Your E-mail");
			$("#email").attr("placeholder", "Enter your E-mail").placeholder();
			$("#fnameLabel").text("Your name");
			$("#fname").attr("placeholder", "Enter your name").placeholder();
			$("#snameLabel").text("Your last name");
			$("#sname").attr("placeholder", "Enter last name").placeholder();
			$("#passwordLabel").text("Create password");
			$("#password").attr("placeholder", "Enter password").placeholder();
			$("#password2Label").text("Enter the password again");
			$("#password2").attr("placeholder", "Repeat password").placeholder();
			$("#submit").val(" Registration ");
			$("#link").text("Return to the site");
			errEmail = "Wrong format E-mail";
			busyEmail = "E-mail busy";
			if(erremail == "�������� ������ E-mail"){
				$("#erremail").text("Wrong format E-mail");
			}else if(erremail == "E-mail �����"){
				$("#erremail").text("E-mail busy");
			}
			errFname = "Do not enter a name";
			if(errfname.length > 0)
				$("#errfname").text("Do not enter a name");
			errSname = "Do not enter a last name";
			if(errsname.length > 0)
				$("#errsname").text("Do not enter a last name");
			if(errpassword.length > 0){
				if(errpassword == "������ ����� 8 ��������")
					$("#errpassword").text("At least 8 characters")
				else
					$("#errpassword").text("at least 8 characters");
			}
			errPassword = "At least 8 characters";
			if(errpassword2.length > 0)
				$("#errpassword2").text("Passwords are different");
			errPassword2 = "Passwords are different";
			$("#link").attr('href', '/en/');
		}else{
			$("#lang").val("ru");
			$("#sel").text("RU");
			$("#title").text("�������� ������� - �����������");
			$("#blue").text("�");
			$("#normal").text("����������");
			$("#inform").text("��� ���� ����������� ��� ����������");
			$("#emailLabel").text("��� E-mail");
			$("#email").attr("placeholder", "������ E-mail").placeholder();
			$("#fnameLabel").text("���� ���");
			$("#fname").attr("placeholder", "������� ���� ���").placeholder();
			$("#snameLabel").text("���� �������");
			$("#sname").attr("placeholder", "������� �������").placeholder();
			$("#passwordLabel").text("���������� ������");
			$("#password").attr("placeholder", "������� ������").placeholder();
			$("#password2Label").text("������ ������ ��� ���");
			$("#password2").attr("placeholder", "��������� ������").placeholder();
			$("#submit").val(" ����������� ");
			$("#link").text("��������� �� ����");
			errEmail = "�������� ������ E-mail";
			busyEmail = "E-mail �����";
			if(erremail == "Wrong format E-mail"){
				$("#erremail").text("�������� ������ E-mail");
			}else if(erremail == "E-mail busy"){
				$("#erremail").text("E-mail �����");
			}
			errFname = "�� ������� ���";
			if(errfname.length > 0)
				$("#errfname").text("�� ������� ���");
			errSname = "�� ������� �������";
			if(errsname.length > 0)
				$("#errsname").text("�� ������� �������");
			if(errpassword.length > 0){
				if(errpassword == "At least 8 characters")
					$("#errpassword").text("������ ����� 8 ��������")
				else
					$("#errpassword").text("�� ����� 8 ��������");
			}
			errPassword = "������ ����� 8 ��������";
			if(errpassword2.length > 0)
				$("#errpassword2").text("������ �� ���������");
			errPassword2 = "������ �� ���������";
			$("#link").attr('href', '/');
		}
	});
	
	function buttonOnAndOff(){
		if(emailStat == 1 && passwordStat == 1 && password2Stat == 1 && fnameStat == 1 && snameStat == 1){
			$("#submit").removeAttr("disabled");
		}else{
			$("#submit").attr("disabled","disabled");
		}
	}
});