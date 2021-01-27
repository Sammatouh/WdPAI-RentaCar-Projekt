<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/generic_style.css">
    <script type="text/javascript" src="public/js/hamburger.js" defer></script>
    <script type="text/javascript" src="public/js/validation.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTER</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="container-v2">
        <div class="register-box">
            <p class="heading-text">Register</p>
            <div class="messages">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }?>
            </div>
            <form action="register" method="POST">
                <input name="first-name" type="text" placeholder="first name" required>
                <input name="surname" type="text" placeholder="surname" required>
                <input name="phone-number" type="text" placeholder="phone number" required>
                <input name="email" type="text" placeholder="email address" required>
                <input name="password" type="password" placeholder="password" required>
                <input name="conf-password" type="password" placeholder="confirm password" required>
                <div class="checkbox-container">
                    <input class="checkbox" id="tos" name="tos" type="checkbox" required>
                    <label for="tos">I agree with
                        <a class="link" href="#">Terms and Conditions</a>
                    </label>
                </div>
                <button class="signup" type="submit">Sign up</button>
                <p>Already have an account?
                    <a class="link" href="login">Login</a></p>

            </form>
        </div>
    </div>
</body>
