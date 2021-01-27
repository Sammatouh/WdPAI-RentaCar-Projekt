<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/generic_style.css">
    <link rel="stylesheet" type="text/css" href="public/css/carListing_style.css">
    <script type="text/javascript" src="public/js/hamburger.js" defer></script>
    <script type="text/javascript" src="public/js/searchCars.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>CAR LISTING</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="heading-container">
        <p class="heading-text">Car Listing</p>
    </div>
    <div class="search-bar">
        <input placeholder="search cars">
    </div>

    <section class="cars-container">
        <?php foreach ($cars as $car): ?>
            <div id="<?= $car->getId(); ?>">
                <p class="car-name"><?= $car->getName(); ?></p>
                <img class="car-image" src="public/uploads/<?= $car->getImage(); ?>">
                <button class="rent">RENT</button>
            </div>
        <?php endforeach; ?>
    </section>

</body>

<template id="car-template">
    <div id="">
        <p class="car-name"></p>
        <img class="car-image" src="">
        <button class="rent">RENT</button>
    </div>
</template>