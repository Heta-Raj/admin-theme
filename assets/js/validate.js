$(document).ready(function () {
	//alert('heta');
	$("form[name='auth_register_boxed']").validate({
		rules:{
			username: "required",
			email:{
				required: true,
				email: true,
			},
			password:{
				required:true,
				minlength: 5,
			},
			checkbox:{
				required:true,
			}
		},
		messages:{
			username:'Enter Username',
			email: 'Enter valid Email',
			password: 'Password must be of 5 char',
			checkbox: 'Please check',
		},
		submitHandler:function(form){
			//alert('submitt');
			form.submit();
		}
	});
});