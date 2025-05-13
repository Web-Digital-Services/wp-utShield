//mobile menu icon

const menuIcon = document.querySelector(".menu-icon"); //Select menu icon 'button'

menuIcon.addEventListener("click", changeIcon); //listen for click


function changeIcon(){

    if ($(menuIcon).hasClass('menu-open')) { //if menu is already open...

        $(menuIcon).removeClass('menu-open'); //remove class that adds X icon, defaults back to menu icon
    } else {
        $(menuIcon).addClass('menu-open'); //if menu is closed, add class that replaces icon
    }

}