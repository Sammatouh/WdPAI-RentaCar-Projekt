const search = document.querySelector('input[placeholder="search cars"]');
const carsContainer = document.querySelector(".cars-container");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (cars) {
            carsContainer.innerHTML = "";
            loadCars(cars)
        });
    }
});

function loadCars(cars) {
    cars.forEach(car => {
        console.log(car);
        createCar(car);
    });
}

function createCar(car) {
    const template = document.querySelector("#car-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = car.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${car.image}`;
    const name = clone.querySelector("p");
    name.innerHTML = car.name;

    carsContainer.appendChild(clone);
}