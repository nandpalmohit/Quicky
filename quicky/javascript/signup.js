const form = document.querySelector(".signup form"),
cntBtn = form.querySelector(".submit button"),
errText = form.querySelector("form .error-alert");


form.onsubmit = (e)=>{
	e.preventDefault(); // preventing form from submitting
}

cntBtn.onclick = ()=>{
	// Starting of Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/signup.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				if(data == 'success'){
					location.href = "user.php";
				}
				else{
					errText.textContent = data;
					errText.style.display = 'block';
				}
			}
		}
	}
	// send the form data through Ajax to php
	let formData = new FormData(form); // crearing new formData object
	xhr.send(formData); // sending form data to php
}
