let rent_button = document.querySelector("#rent-button");
let form_window = document.querySelector("#rent-form");
let form_panel = document.querySelector("form");
let close_button = document.querySelector("#rent-form-close-span");
let date_from = document.querySelector("#rent-form-date-from");
let date_to = document.querySelector("#rent-form-date-to");
let error = document.querySelector("#rent-form-error");
let total_text = document.querySelector("#rent-form-total-text");
let car_wash_text = document.querySelector("#rent-form-car-wash");
let flowers_text = document.querySelector("#rent-form-flowers");
let car_price_text = document.querySelector("#rent-car-price");
let rent_dates = null;
try{
    rent_dates = document.querySelector("#rent-form-dates").querySelectorAll("p");
} catch{}
let form_submit = document.querySelector("#rent-form-submit");

let clicked_inside_form = false;
let can_click = false;

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

document.addEventListener("keydown", (event) => {
    if(event.key === "Escape" && !event.repeat){
        event.preventDefault();
        form_window.style.opacity = 0;
        setTimeout(() => {
            form_window.style.visibility = "hidden";
        }, 200);
    }
});

let date1, date2;
let car_price_total = 0, car_wash = 0, flowers = 0;

function compareDates(){
    let now = new Date((new Date()) - 60000);

    if(!isNaN(date2 - date1)){
        if(date1 < now || date2 < now){
            error.innerText = "Data wynajmu musi być w przyszłości";
            can_click = false;
        } else{
            error.innerText = "\xa0";
            if(date1 > date2){
                error.innerText = "Data końca wynajmu musi być późniejsza, niż data początku";
                can_click = false;
            } else{
                error.innerText = "\xa0";
                if(((date2 - date1) / 1000 / 60 / 60) < 24){
                    error.innerText = "Minimalna długość wynajmu to 24 godziny";
                    can_click = false;
                } else{
                    error.innerText = "\xa0";
                    if(((date2 - date1) / 1000 / 60 / 60) > 8784){
                        error.innerText = "Maksymalna długość wynajmu to jeden rok";
                        can_click = false;
                    } else{
                        if(rent_dates !== null){
                            for(let i = 0; i < rent_dates.length; i++){
                                let rent_dates1 = rent_dates[i].innerText.split(" - ")[0];
                                let rent_dates2 = rent_dates[i].innerText.split(" - ")[1];

                                let rent_date1_day = rent_dates1.split(".")[0];
                                let rent_date1_month = rent_dates1.split(".")[1];
                                let rent_date1_year = rent_dates1.split(".")[2].split(" ")[0];
                                let rent_date1_hour = rent_dates1.split(".")[2].split(" ")[1];

                                let rent_date2_day = rent_dates2.split(".")[0];
                                let rent_date2_month = rent_dates2.split(".")[1];
                                let rent_date2_year = rent_dates2.split(".")[2].split(" ")[0];
                                let rent_date2_hour = rent_dates2.split(".")[2].split(" ")[1];

                                let date_rent1 = new Date(`${rent_date1_year}-${rent_date1_month}-${rent_date1_day}T${rent_date1_hour}:00`);
                                let date_rent2 = new Date(`${rent_date2_year}-${rent_date2_month}-${rent_date2_day}T${rent_date2_hour}:00`);

                                if((date1 >= date_rent1 && date1 <= date_rent2) || (date2 >= date_rent1 && date2 <= date_rent2) || (date1 <= date_rent1 && date2 >= date_rent2)){
                                    error.innerText = "Ten samochód jest już wynajęty w tym czasie";
                                    can_click = false;
                                    break;
                                } else{
                                    error.innerText = "\xa0";

                                    let unix_diff = Math.ceil(date2 - date1);
                                    let unix_diff_ratio = Math.ceil(unix_diff / 1000 / 60 / 60 / 24);
                                    let car_price = parseInt(car_price_text.innerText.split(" za")[0]);
                                    car_price_total = parseInt(Math.ceil(unix_diff_ratio * car_price));
    
                                    updateTotalText();
                                    can_click = true;
                                }
                            }
                        } else{
                            error.innerText = "\xa0";

                            let unix_diff = Math.ceil(date2 - date1);
                            let unix_diff_ratio = Math.ceil(unix_diff / 1000 / 60 / 60 / 24);
                            let car_price = parseInt(car_price_text.innerText.split(" za")[0]);
                            car_price_total = parseInt(Math.ceil(unix_diff_ratio * car_price));
    
                            updateTotalText();
                            can_click = true;
                        }
                    }
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

function updateTotalText(){
    let total = car_price_total + car_wash + flowers;
    total = total.toLocaleString("pl-PL");
    total_text.innerHTML = `<h4>Suma: <b>${total}</b> zł</h4>`;
}

car_wash_text.addEventListener("change", () => {
    if(car_wash_text.checked){
        car_wash = 50;
        updateTotalText();
    } else{
        car_wash = 0;
        updateTotalText();
    }
});

flowers_text.addEventListener("change", () => {
    if(flowers_text.checked){
        flowers = 75;
        updateTotalText();
    } else{
        flowers = 0;
        updateTotalText();
    }
});

form_submit.addEventListener("click", (event) => {
    if(!can_click) event.preventDefault();
});
