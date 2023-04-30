let cars = document.querySelectorAll(".car-card");

cars.forEach(car => {
    let string = car.querySelector("h5").innerText;
    let formatted = string.replaceAll(" ", "_");
    
    car.querySelector("a").href = `rent.php?auto=${formatted}`;
});
