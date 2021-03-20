const searchBar = document.querySelector(".user .search input"),
searchBtn = document.querySelector(".user .search button"),
userList = document.querySelector(".user .users-list");


searchBtn.onclick = () =>{
	searchBar.classList.toggle("active");
	searchBar.focus();
	searchBtn.classList.toggle("active");
}
// work on search
searchBar.onkeyup = ()=>{
	let searchTerm = searchBar.value;
	if(searchTerm != ""){
		searchBar.classList.add("active");
	}else{
		searchBar.classList.remove("active");

	}
	// Starting of Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/search.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				userList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send("searchTerm=" +searchTerm);
}

setInterval(()=>{
	// Starting of Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("GET", "php/users.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				if(!searchBar.classList.contains("active")){
					userList.innerHTML = data;
				}
			}
		}
	}
	xhr.send();
}, 500); //this fun will run frequently after 500ms