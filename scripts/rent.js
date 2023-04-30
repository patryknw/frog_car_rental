let rent_button = document.querySelector("#rent-button");
let form_window = document.querySelector("#rent-form");
let form_panel = document.querySelector("form");

let clicked_inside_form = false;

rent_button.addEventListener("click", () => {
    form_window.style.visibility = "visible";
    form_window.style.opacity = 1;
});

form_panel.addEventListener("click", () => {
    clicked_inside_form = true;
});

form_window.addEventListener("click", () => {
    if(!clicked_inside_form){
        form_window.style.opacity = 0;
        setTimeout(() => {
            form_window.style.visibility = "hidden";
        }, 200);
    }
    clicked_inside_form = false;
});
