let business_checkbox = document.querySelector("#business");
let nip = document.querySelector("#nip");
let regon = document.querySelector("#regon");

nip.style.visibility = "hidden";
regon.style.visibility = "hidden";

business_checkbox.addEventListener("click", () => {
    if(business_checkbox.checked){
        nip.style.visibility = "visible";
        regon.style.visibility = "visible";
    } else{
        nip.style.visibility = "hidden";
        regon.style.visibility = "hidden";
    }
});
