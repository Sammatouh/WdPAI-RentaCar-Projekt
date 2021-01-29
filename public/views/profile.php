<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/generic_style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile_style.css">
    <script type="text/javascript" src="/public/js/hamburger.js" defer></script>
    <script type="text/javascript" src="/public/js/modal.js" defer></script>
    <script src="https://kit.fontawesome.com/4be3a0db2f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="top-container">
        <div class="profile-heading">
            <p class="heading-text">Your profile</p>
        </div>
        <a class="logout-link" href="/logout"><button class="logout">LOGOUT</button></a>
    </div>

    <div id="fileModal" class="modal">
        <div class="modal-content">
            <span onclick="closeModal()" class="close">&times;</span>
            <h3>Change your profile picture</h3>
            <form action="/changeAvatar/<?= $user->getId(); ?>" method="POST" enctype="multipart/form-data">
                <input id="profPic" class="img-input" name="profilePic" type="file" onchange="return validFile()" required>
                <label for="profPic">Supported file types:<br>.jpeg, .png, .gif</label>
                <button class="change" type="submit" onclick="return isEmpty()">CHANGE</button>
            </form>
        </div>
    </div>

    <div class="profile-information">
        <div class="avatar-box">
            <img class="avatar-image" src="/public/uploads/avatars/<?= $user->getId() . "/" . $user->getAvatar(); ?>">
            <div class="middle">
                <span class="img-upload" onclick="openModal()"><i class="fas fa-image"></i></span>
            </div>
        </div>

        <div class="user-info">
            <label class="detail-name">Name: <b class="user-details"><?= $user->getName(); ?></b></label>
            <hr>
            <label class="detail-name">Surname: <b class="user-details"><?= $user->getSurname(); ?></b></label>
            <hr>
            <label class="detail-name">Email: <b class="user-details"><?= $user->getEmail(); ?></b></label>
            <hr>
            <label class="detail-name">Phone: <b class="user-details"><?= $user->getPhone(); ?></b></label>
            <hr>
            <label class="detail-name">Join Time: <b class="user-details"><?= $user->getJoinTime(); ?></b></label>
            <hr>
        </div>
    </div>

    <hr class="divider">

    <div class="heading-container">
        <p class="heading-text">Your bookings</p>
    </div>
    <section class="bookings-container">
        <?php foreach ($userBookings as $userBooking): ?>
        <div id="<?= $userBooking->getBookingId(); ?>">
            <p class="car-name"><?= $userBooking->getCarName(); ?></p>
            <img class="car-image" src="/public/uploads/cars/<?= $userBooking->getImage(); ?>">
            <p class="booking-info">Booked: <?= $userBooking->getWhenBooked(); ?></p>
            <p class="booking-info">for: <?= $userBooking->getDays(); ?> day(s)</p>
            <p class="booking-info">Paid: <?= $userBooking->getValue(); ?>$</p>
        </div>
        <?php endforeach; ?>
    </section>

    <hr class="divider">

    <?php if (isset($_SESSION) && $_SESSION['admin']) { ?>
    <div class="heading-container">
        <p class="heading-text">All bookings</p>
    </div>
    <section class="bookings-container">
        <?php foreach ($allBookings as $booking): ?>
        <div id="<?= $booking->getBookingId(); ?>">
            <p class="car-name"><?= $booking->getCarName(); ?></p>
            <img class="car-image" src="/public/uploads/cars/<?= $booking->getImage(); ?>">
            <p class="booking-info">Booked: <?= $booking->getWhenBooked(); ?></p>
            <p class="booking-info">for: <?= $booking->getDays(); ?> day(s)</p>
            <p class="booking-info">Paid: <?= $booking->getValue(); ?>$</p>
            <p class="booking-info"><?= $booking->getUserName() . " " . $booking->getSurname(); ?></p>
            <p class="booking-info"><?= $booking->getEmail(); ?></p>
            <a class="delete-link" href="/deleteBooking/<?= $booking->getBookingId(); ?>"><button class="delete">DELETE</button></a>
        </div>
        <?php endforeach; ?>
    </section>
    <?php } ?>

</body>
</html>