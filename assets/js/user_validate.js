$(document).ready(function(){

	//alert('hey');
	$("form[name='user_reg']").validate({
		rules:{
			username: 'required',
			f_name: 'required',
			l_name: 'required',
			email: {
				required: true,
				email:true,
			},
			password:{
				required:true,
				minlength: 4,
			},
			dob:'required',
			city:{
				required:true
			},
			state:{
				required:true
			},
			country:{
				required:true
			},
			pincode:{
				required: true,
				maxlength:6
			},
			gender:{
				required:true
			}
		},
		messages:{
			username:'Enter Username',
			f_name:'Enter Firstname',
			l_name:'Enter Lastname',
			email: 'Enter valid Email',
			password: 'Password must be of 4 char',
			dob:'Date of birth is required',
			city:'city required',
			state:'state required',
			country:'country required',
			pincode: 'pincode required',
			gender:'gender required',

		},
		submitHandler:function(form){
		//alert('submitt');
		form.submit();
	},
	
});
	 
});