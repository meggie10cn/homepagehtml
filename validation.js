/**
 * Created by maggie on 11/18/15.
 */
<!--javascript code for the user and password validations-->

    //validation function
function validation(){
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
    var fna = /^[A-Za-z]+$/;
    var lna = /^[A-Za-z]+$/;
    var em= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ // /^\w+@sju\.edu$/; //regular expresion for the email address
    var pa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
    var confpa= /^\w{6,8}$/;  //regular expresion for the password from 6-8
    var pho = /^[0-9]+$/;
    //var addr = /^[0-9a-zA-Z]+$/;
    var cit = /^[A-Za-z]+$/;
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
    //if (!address.match(addr)) {  //if the password does not match send a message to the user
    //    alert("Must be a valid address");
    //    return false;

if (!city.match(cit)) {  //if the password does not match send a message to the user
    alert("Letters only on City field!");
    return false;
}
if (!zipCode.match(zipc)) {  //if the password does not match send a message to the user
    alert("Zip code must be numeric only!");
    return false;
}
}
