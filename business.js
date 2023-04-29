let business_checkbox = document.querySelector("#business");
let nip = document.querySelector("#nip");
let regon = document.querySelector("#regon");

business_checkbox.addEventListener("click", () => {
    if(business_checkbox.checked){
        nip.style.display = "inline";
        regon.style.display = "inline";
    } else{
        nip.style.display = "none";
        regon.style.display = "none";
    }
});
