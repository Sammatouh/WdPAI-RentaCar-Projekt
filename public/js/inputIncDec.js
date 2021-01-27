const form = document.querySelector("form");
const daysInput = form.querySelector('input[name="nodays"]');
const valueInput = form.querySelector('input[name="value"]');

function empty() {
    if (daysInput.value === '') {
        alert("Number of days can't be empty");
        return false;
    }
}

function increment() {
    let days = daysInput.value;
    days = isNaN(days) ? 0 : days;
    days++
    daysInput.value = days;
    refreshValue();
}

function decrement() {
    let days = daysInput.value;
    days = isNaN(days) ? 0 : days;
    if (days > 1)
        days--
    daysInput.value = days;
    refreshValue();
}

function refreshValue() {
    let days = daysInput.value;
    let price = parseInt(document.getElementById("price").innerHTML, 10);
    days = isNaN(days) ? 0 : days;
    valueInput.value = days * price;
}