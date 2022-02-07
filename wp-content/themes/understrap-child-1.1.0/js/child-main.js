document.addEventListener("DOMContentLoaded", () => {
	currentYear();
	mobileMenu();
  });
  
  //Mobile menu
  function mobileMenu() {
	const openBtn = document.querySelector(".header__mobile-btn");
	const menu = document.querySelector("#header nav.body");
  
	if ((openBtn, menu)) {
	  openBtn.addEventListener("click", function (event) {
		event.preventDefault();
		if (menu.classList.contains("menu-opened")) {
		  menu.classList.remove("menu-opened");
		  openBtn.classList.remove("menu-opened");
		} else {
		  menu.classList.add("menu-opened");
		  openBtn.classList.add("menu-opened");
		}
	  });
	}
  }
  
  //Current Year
  function currentYear() {
	document.getElementById("year").innerHTML = new Date().getFullYear();
  }