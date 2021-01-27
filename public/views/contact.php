<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/generic_style.css">
    <link rel="stylesheet" type="text/css" href="public/css/contact_style.css">
    <script type="text/javascript" src="public/js/hamburger.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>CONTACT</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="wide-container">
        <div class="slim-box">
            <div class="contact-container">
                <p class="heading-text">Contact Info</p>
                <p class="info-text">telephone<br><br>+48 655889221<br>+48 789951148</p>
                <p class="info-text">email<br><br>rentacar.info@rentacar.com</p>
                <p class="info-text">Rentacar Ltd.<br>Address Street<br>zip-code, City</p>
            </div>
        </div>
        <div class="fat-box">
            <div class="form-container">
                <p class="heading-text">Have a question?</p>
                    <form class="contact-form">
                        <input class="name-box" name="name" type="text" placeholder="name">
                        <input class="surname-box" name="surname" type="text" placeholder="surname">
                        <input class="email-box" name="email" type="email" placeholder="email">
                        <input class="phone-box" name="phone-number" type="text" placeholder="phone number">
                        <textarea class="message-box" name="message" placeholder="message"></textarea>
                        <button class="send-button">SEND</button>
                    </form>
            </div>
        </div>
    </div>
</body>
