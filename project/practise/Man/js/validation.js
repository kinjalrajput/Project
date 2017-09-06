 
	   function validation()
	   {
		if(document.add_form.first_name.value.search(/^[A-Z a-z]+$/))
		{
				alert("Enter characters only in your firstname");
				return false;
		}
		else 	if(document.add_form.last_name.value.search(/^[A-Z a-z]+$/))
		{
				alert("Enter characters only in your lastname");
				return false;
		}
		else 	if(document.add_form.user_name.value.search(/^[A-Z a-z]+$/))
		{
				alert("Enter characters only in your username");
				return false;
		}
		else if(document.add_form.image.value=="")
		{
				alert("Select your profile picture");
				return false;
		}
		else 	if(document.add_form.mobile.value.search(/^[0-9]+$/))
		{
				alert("Enter only digits in mobile no");
				return false;
		}
		else 	if(document.add_form.mobile.value.length != 10)
		{
				alert("Enter mobile no within 10 digits");
				return false;
		}
		}
 