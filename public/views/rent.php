<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/generic_style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/rent_style.css">
    <script type="text/javascript" src="/public/js/hamburger.js" defer></script>
    <script type="text/javascript" src="/public/js/inputIncDec.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="heading-container">
        <p class="heading-text">Rent <?= $car->getName(); ?></p>
    </div>

    <div class="rental-information">
        <img src="/public/uploads/cars/<?= $car->getImage(); ?>">
        <hr class="breaking-line">
        <p class="car-info"><?= $car->getInfo(); ?></p>
        <hr class="breaking-line">
        <p class="car-info">Price per day: <b id="price"><?= $car->getPricePerDay(); ?></b>$</p>
        <form action="/rentCar/<?= $car->getId(); ?>" method="POST">
            <div class="form-row">
                <label for="nodays">Days:</label>
                <input id="nodays" name="nodays" type="number" min="1" max="365" value="1" required>
                <button type="button" onclick="decrement()">-</button>
                <button type="button" onclick="increment()">+</button>
            </div>
            <div class="form-row">
                <label for="value">Value:</label>
                <input id="value" name="booking-value" type="number" value="<?= $car->getPricePerDay(); ?>" readonly>
                <label>$</label>
            </div>
            <hr class="breaking-line">
            <button class="rent-button" type="submit" onclick="return empty()">RENT</button>
        </form>
    </div>

</body>
</html>