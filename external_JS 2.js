//emailValidation function to check if the email was entered correctly
function emailValidation(){
    var user=document.forms["check"]["uname"].value;
    //it does not allow dealing and triling spaces
	var em= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //regular expresion for the email address
         
	if (!user.match(em)) { //if the email does not match send a message to the user that the email is not correct
        alert("Sorry!! You entered an invalid email. Please try again.");
        return false;
    }
}

//jobSeekerValidation for registration function
function jobSeekerValidation(){
    var fname=document.forms["validate"]["fname"].value;
    var lname=document.forms["validate"]["lname"].value;
    var email=document.forms["validate"]["email"].value;
	var passwd=document.forms["validate"]["password"].value;
	var confpasswd=document.forms["validate"]["confpass"].value;
	var phone=document.forms["validate"]["phone"].value;
	//var address=document.forms["validate"]["address"].value;
	var city=document.forms["validate"]["city"].value;
	var zipCode=document.forms["validate"]["zip"].value;
	//no dealing and triling spaces
	var fna = /[A-Za-z]$/;
	var lna = /[A-Za-z]$/;
	var em= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ // /^\w+@sju\.edu$/; //regular expresion for the email address
	var pa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
    var confpa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
	var pho = /^[0-9]+$/;
	var addr = /[0-9a-zA-Z]$/;  
	var cit = /[A-Za-z]$/;
	var zipc = /^[0-9]+$/;
		 
	if (!fname.match(fna)) { //if the email does not match send a message to the fname
        alert("Letters only on First Name field!");
        return false;
    }
	if (!lname.match(lna)) { //if the email does not match send a message to the fname
        alert("Letters only on Last Name field!");
        return false;
    }
	if (!email.match(em)) { //if the email does not match send a message to the fname
        alert("Must be a valid email!");
        return false;
    }
	if (!passwd.match(pa)) {  //if the password does not match send a message to the user
        alert("Invalid password - 6 to 8 characters!");
        return false;
    }	
    if (!confpasswd.match(confpa)) {  //if the password does not match send a message to the user
        alert("Invalid password - 6 to 8 characters!");
        return false;
    }
	if (!phone.match(pho)) {  //if the password does not match send a message to the user
        alert("Phone must be numeric only!");
        return false;
    }
	if (!city.match(cit)) {  //if the password does not match send a message to the user
        alert("Letters only on City field!");
        return false;
    }
	if (!zipCode.match(zipc)) {  //if the password does not match send a message to the user
        alert("Zip code must be numeric only!");
        return false;
    }
}

//employerValidation for registration function
function employerValidation(){
    var email=document.forms["validate"]["email"].value;
    var passwd=document.forms["validate"]["password"].value;
	var confpasswd=document.forms["validate"]["confpass"].value;
	var contact_name=document.forms["validate"]["contact_name"].value;
	var company_name=document.forms["validate"]["company_name"].value;
	var phone=document.forms["validate"]["phone"].value;
	//var address=document.forms["validate"]["address"].value;
	//var website_url=document.forms["validate"]["website_url"].value; 
	var city=document.forms["validate"]["city"].value;
	var zipCode=document.forms["validate"]["zip"].value;
	//no dealing and triling spaces
	var em= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ // /^\w+@sju\.edu$/; //regular expresion for the email address
	var pa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
    var confpa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
	var contna = /[A-Za-z]$/;
	var compna = /[A-Za-z]$/;
	var pho = /^[0-9]+$/;
    //var addr = /^[0-9a-zA-Z]+$/; 
	var cit = /[A-Za-z]$/;
	var zipc = /^[0-9]+$/;
		 
	if (!email.match(em)) { //if the email does not match send a message to the fname
        alert("Must be a valid email!");
        return false;
    }
	if (!passwd.match(pa)) {  //if the password does not match send a message to the user
        alert("Invalid password - 6 to 8 characters!");
        return false;
    }	
    if (!confpasswd.match(confpa)) {  //if the password confirmation does not match send a message to the user
        alert("Invalid password - 6 to 8 characters!");
        return false;
    }
	if (!contact_name.match(contna)) { //if the contact name does not match send a message to the fname
        alert("Letters only on Contact Name field!");
        return false;
    }
	if (!company_name.match(compna)) { //if the company name does not match send a message to the fname
        alert("Letters only on Company Name field!");
        return false;
    }
	if (!phone.match(pho)) {  //if the phone number does not match send a message to the user
        alert("Phone must be numeric only!");
        return false;
    }
	if (!city.match(cit)) {  //if the city does not match send a message to the user
        alert("Letters only on City field!");
        return false;
    }
	if (!zipCode.match(zipc)) {  //if the zip code does not match send a message to the user
        alert("Zip code must be numeric only!");
        return false;
    }
}



