<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/generic_style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile_style.css">
    <script type="text/javascript" src="/public/js/hamburger.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="top-container">
        <div class="profile-heading">
            <p class="heading-text">Your profile</p>
        </div>
        <button class="logout">LOGOUT</button>
    </div>


    <div class="profile-information">
        <img src="/public/uploads/default_avatar.png">
        <div class="user-info">
            <label class="detail-name">Name: <b class="user-details">Marcin</b></label>
            <hr>
            <label class="detail-name">Surname: <b class="user-details">Brożek</b></label>
            <hr>
            <label class="detail-name">Email: <b class="user-details">marcin@gmail.com</b></label>
            <hr>
            <label class="detail-name">Phone: <b class="user-details">999888777</b></label>
            <hr>
            <label class="detail-name">Join Time: <b class="user-details">28-01-2021 18:26:16</b></label>
            <hr>
        </div>
    </div>

    <hr class="divider">

    <div class="heading-container">
        <p class="heading-text">Your bookings</p>
    </div>
    <section class="bookings-container">
        <div id="booking-id">
            <p class="car-name">carname</p>
            <img class="car-image" src="public/uploads/ford_mustang_shelby_gt350.jpg">
            <p class="booking-info">Booked: </p>
            <p class="booking-info">for: X day(s)</p>
        </div>
    </section>

    <hr class="divider">

    <div class="heading-container">
        <p class="heading-text">All bookings</p>
    </div>
    <section class="bookings-container">
        <div id="booking-id">
            <p class="car-name">carname</p>
            <img class="car-image" src="public/uploads/ford_mustang_shelby_gt350.jpg">
            <p class="booking-info">Booked: </p>
            <p class="booking-info">for: X day(s)</p>
            <p class="booking-info">Name Surname</p>
            <p class="booking-info">email</p>
            <button class="cancel">DELETE</button>
        </div>
    </section>

    <?php if (isset($_SESSION) && $_SESSION['admin']) { ?>
    <div class="heading-container">
        <p class="heading-text">All bookings</p>
    </div>
    <section class="bookings-container">
        <div id="booking-id">
            <p class="car-name">carname</p>
            <img class="car-image" src="public/uploads/ford_mustang_shelby_gt350.jpg">
            <p class="booking-info">Booked: </p>
            <p class="booking-info">for: X day(s)</p>
            <p class="booking-info">Name Surname</p>
            <p class="booking-info">email</p>
            <button class="cancel">DELETE</button>
        </div>
    </section>
    <?php } ?>

</body>
</html>