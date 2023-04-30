let sort_button = document.querySelector("#car-sort-select");

sort_button.addEventListener("change", () => {
    window.location.replace(`cars.php?sort=${sort_button.value}`);
});

let url = window.location.href;
let formatted = url.split("?sort=")[1];

Array.prototype.forEach.call(sort_button.options, (option, index) => {
    if(option.value == formatted){
        sort_button.options[index].selected = true;
    }
});
