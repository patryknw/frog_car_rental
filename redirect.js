let cars = document.querySelectorAll(".car-card");

cars.forEach(car => {
    car.addEventListener("click", () => {
        let string = car.querySelector("img").src;
        let split = string.split("/");
        let last = split[split.length - 1];
        let id = last.split(".")[0];

        window.location.href = `rent.php?id=${id}`;
    });
});
