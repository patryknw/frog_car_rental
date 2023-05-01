let rent_button = document.querySelector("#rent-button");
let form_window = document.querySelector("#rent-form");
let form_panel = document.querySelector("form");
let close_button = document.querySelector("#rent-form-close-span");
let date_from = document.querySelector("#rent-form-date-from");
let date_to = document.querySelector("#rent-form-date-to");
let error = document.querySelector("#rent-form-error");

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

close_button.addEventListener("click", () => {
    form_window.style.opacity = 0;
    setTimeout(() => {
        form_window.style.visibility = "hidden";
    }, 200);
});

let date1, date2;

function compareDates(){
    let now = new Date((new Date()) - 60000);

    if(date1 < now || date2 < now){
        error.innerText = "Data wynajmu musi być w przyszłości";
    } else{
        error.innerText = "\xa0";
        if(date1 > date2){
            error.innerText = "Data końca wynajmu musi być późniejsza, niż data początku";
        } else{
            error.innerText = "\xa0";
            if(((date2 - date1) / 1000 / 60 / 60) < 24){
                error.innerText = "Minimalna długość wynajmu to 24 godziny";
            } else{
                error.innerText = "\xa0";
                if(((date2 - date1) / 1000 / 60 / 60) > 8784){
                    error.innerText = "Maksymalna długość wynajmu to jeden rok";
                } else{
                    error.innerText = "\xa0";
                    console.log("aok");
                }
            }
        }
    }
}

date_from.addEventListener("change", () => {
    date1 = new Date(date_from.value);
    compareDates();
});

date_to.addEventListener("change", () => {
    date2 = new Date(date_to.value);
    compareDates();
});
