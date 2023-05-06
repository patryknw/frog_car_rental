let header = document.querySelector("header");
let header_links = document.querySelector("#header-links").querySelectorAll("a");
let header_icons = document.querySelector("#header-socials").querySelectorAll(".header-icon-div");

function switchToDark(){
    header.style.backgroundColor = "rgba(0, 0, 0, 0.1)";
    header_links.forEach(element => {
        element.style.color = "rgba(255, 255, 255, 0.9)";
    });

    header_icons.forEach(element => {
        element.style.filter = "invert(1)";
        element.style.webkitFilter = "invert(1)";
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
    });
}

let isDarkMode = true;
switchToDark();

document.addEventListener("scroll", () => {
    if(window.scrollY >= 1000){
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
});
