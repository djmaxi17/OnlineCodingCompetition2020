//validation for shop form
function formValidationShop(){
	var companyName = document.forms["shopf"]["shopname"].value;
	var companyEmail = document.forms["shopf"]["shopemail"].value;
	var companypwd = document.forms["shopf"]["shoppassword"].value;
	var cpasswordf = document.forms["shopf"]["shopconfirmpwd"].value;
	var companyAddress = document.forms["shopf"]["shopaddress"].value;
	var retailspace = document.forms["shopf"]["shopspace"].value;
	var servicepercustomer = document.forms["shopf"]["shopservicetime"].value;

	//validate company email
	ValidateEmail(companyEmail);

	//validate the passwords
	if(companypwd == ''){
		alert("please fill the password field");
		document.getElementById('companypwd').style.borderColor = "red";
		return false;
	}
	else if(cpasswordf == ''){
		alert("please fill the confirm password field");
		document.getElementById('companycpwd').style.borderColor = "red";

		return false;
	}
	else if (companypwd != cpasswordf) { 
		alert ("\nPassword did not match: Please try again...");
		document.getElementById('companypwd').style.borderColor = "red";
		document.getElementById('companycpwd').style.borderColor = "red";

	    return false; 
	}
	else{
		return true
	}

	// check if retailspace & servicepercustomer is a number
	checkInteger(retailspace);
	checkInteger(servicepercustomer);
}
//validation for client form
function formValidationClient(){
	var clientFname = document.forms["customerf"]["clientfname"].value;
	var clientLname = document.forms["customerf"]["clientlname"].value;
	var clientEmail = document.forms["customerf"]["clientemail"].value;
	var clientpwd = document.forms["customerf"]["clientpassword"].value;
	var cclientpasswordf = document.forms["customerf"]["clientconfirmpassword"].value;

	//validate user email
	ValidateEmail(clientEmail);
		//validate the passwords
	if(clientpwd == ''){
		alert("please fill the password field");
		document.getElementById('clientpwd').style.borderColor = "red";
		return false;
	}
	else if(cclientpasswordf == ''){
		alert("please fill the confirm password field");
		document.getElementById('clientcpwd').style.borderColor = "red";
		return false;
	}
	else if (clientpwd != cclientpasswordf) { 
		alert ("\nPassword did not match: Please try again...");
		document.getElementById('clientpwd').style.borderColor = "red";
		document.getElementById('clientcpwd').style.borderColor = "red";
	    return false; 
	}
	else{
		return true
	}
}

// function to validate email
function ValidateEmail(inputText){
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(inputText.match(mailformat)){
		document.shopf.emailf.focus();
		return true;
	}
	else
	{
		alert("You have entered an invalid email address!");
		document.getElementById('companyname').style.borderColor = "red";
		return false;
	}
}
function checkInteger(x)
{
    var regex=/^[0-9]+$/;
    if (x.match(regex))
    {
        alert("Must input numbers");
        return false;
    }
}

//jquery codes
$(document).ready(function(){
  $("#displogin").click(function(){
    $("#popuplogin").fadeToggle();
  });
  $("#closepopuplogin").click(function(){
  	$("#popuplogin").fadeToggle();
  });
});