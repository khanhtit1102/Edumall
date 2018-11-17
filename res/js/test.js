// Email 
function ktemail () {
	var button = document.getElementById('btnsubmit');
	var email = document.getElementById('email');
	var regEmail = /^[a-zA-Z0-9]+\@+[a-zA-Z0-9]+\.+[a-zA-Z0-9]+$/;
	if (!regEmail.test(email.value)) {
		alert("Nhập đúng định đạng email!");
		console.log(button);
		button.classList.add('disable');
		email.focus();
	} else {
		button.classList.remove('disable');
	}

}
