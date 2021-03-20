const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
	e.preventDefault(); // preventing form from submitting
}

sendBtn.onclick = ()=>{
	// Starting of Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/insert-chat.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				inputField.value = ""; //once message inserted into database then leave blank input field
				scrollToBottom();
			}
		}
	}
	// send the form data through Ajax to php
	let formData = new FormData(form); // crearing new formData object
	xhr.send(formData); // sending form data to php
}

chatBox.onmouseenter = ()=>{
	chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
	chatBox.classList.remove("active");
}

setInterval(()=>{
	// Starting of Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/get-chat.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				chatBox.innerHTML = data;
				if(!chatBox.classList.contains("active")){
					scrollToBottom();
				}
			}
		}
	}
	// send the form data through Ajax to php
	let formData = new FormData(form); // crearing new formData object
	xhr.send(formData); // sending form data to php
}, 500); //this fun will run frequently after 500ms

// chat scroll to bottom
function scrollToBottom(){
	chatBox.scrollTop = chatBox.scrollHeight;
}