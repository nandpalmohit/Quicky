const passField = document.querySelector(".form input[type='password']"),
iconBtn = document.querySelector('.form .field i');

iconBtn.onclick = () => {
	if(passField.type == 'password'){
		passField.type = 'text';
		iconBtn.classList.add("active");
	}
	else{
		passField.type = 'password';
		iconBtn.classList.remove("active");

	}
}