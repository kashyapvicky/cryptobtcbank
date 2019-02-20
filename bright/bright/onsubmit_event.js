// Below Function Executes On Form Submit
function ValidationEvent() {
	alert('here');
	return false;
// Storing Field Values In Variables
var name = document.getElementById("name").value;
var name = document.getElementById("u_name").value;
var mobile = document.getElementById("mobile").value;
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;
var password = document.getElementById("pos").value;
// Regular Expression For Email
//var emailReg = /(.+)@(.+){2,}\.(.+){2,}/;
// Conditions
if (name != '' && mobile != '' && email != '' && password != '') {
if (email.match(/(.+)@(.+){2,}\.(.+){2,}/)) {
	if (password.length == 10) {
	alert("All type of validation has done on OnSubmit event.");
	return true;
	} else {
	alert("The Contact No. must be at least 10 digit long!");
	return false;
	}

} else {
alert("Invalid Email Address...!!!");
return false;
}
} else {
alert("All fields are required.....!");
return false;
}
}