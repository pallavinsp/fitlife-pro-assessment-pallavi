document.addEventListener(
"DOMContentLoaded",
function(){


const toggle = document.querySelector(
".mobile-toggle"
);


const menu = document.querySelector(
".main-navigation"
);



if(toggle && menu){



toggle.addEventListener(
"click",
function(){


menu.classList.toggle(
"active"
);


toggle.classList.toggle(
"open"
);



}
);



}



const links = document.querySelectorAll(
".main-navigation a"
);



links.forEach(
function(link){


link.addEventListener(
"click",
function(){


if(menu.classList.contains("active")){


menu.classList.remove(
"active"
);


toggle.classList.remove(
"open"
);


}


}

);


});


});