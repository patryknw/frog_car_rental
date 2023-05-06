let header = document.querySelector("header");
let header_links = document.querySelector("#header-links").querySelectorAll("a");
let header_icons = document.querySelector("#header-socials").querySelectorAll(".header-icon-div");
let scroll_icon = document.querySelector("#welcome-scroll");

function switchToDark(){
    header.style.backgroundColor = "rgba(0, 0, 0, 0.1)";
    header_links.forEach(element => {
        element.style.color = "rgba(255, 255, 255, 0.9)";
    });

    header_icons.forEach(element => {
        element.style.filter = "invert(1)";
        element.style.webkitFilter = "invert(1)";
        element.style.opacity = 0.9;
    });
}

function switchToLight(){
    header.style.backgroundColor = "rgba(255, 255, 255, 0.9)";

    header_links.forEach(element => {
        element.style.color = "black";
    });

    header_icons.forEach(element => {
        element.style.filter = "invert(0)";
        element.style.webkitFilter = "invert(0)";
        element.style.opacity = 1;
    });
}

let isDarkMode = true;
let isShown = true;
switchToDark();

function updateHeaderColor(){
    if(window.scrollY >= window.innerHeight){
        if(isDarkMode){
            switchToLight();
            isDarkMode = false;
        }
    } else{
        if(!isDarkMode){
            switchToDark();
            isDarkMode = true;
        }
    }

    if(window.scrollY >= (window.innerHeight / 4)){
        if(isShown){
            scroll_icon.style.opacity = 0;
            setTimeout(() => {
                scroll_icon.style.visibility = "hidden";
            }, 300);
            isShown = false;
        }
    } else{
        if(!isShown){
            scroll_icon.style.opacity = 1;
            scroll_icon.style.visibility = "visible";
            isShown = true;
        }
    }
}

updateHeaderColor();
document.addEventListener("scroll", updateHeaderColor);
