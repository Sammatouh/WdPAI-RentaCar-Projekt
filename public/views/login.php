<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/generic_style.css">
    <script src="public/js/hamburger.js" defer></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>MAIN PAGE</title>
</head>
<body>
    <?php include('components/navbar.php') ?>

    <div class="container">
        <div class="login-box">
            <div class="login-container">
                <p class="heading-text">Login</p>
                <div class="messages">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                </div>
                <form action="login" method="POST">
                    <input name="email" type="text" placeholder="email address">
                    <input name="password" type="password" placeholder="password">
                    <button class="login" type="submit">Login</button>
                </form>
                <p>Don't have an account?<br>
                    <a class="link" href="register">Sign up</a>
                </p>
                <a class="link" href="#">Forgot password?</a>
            </div>
        </div>
        <div class="info-box">
            <div class="read-more">
                <p class="heading-text">FIND THE RIGHT CAR FOR YOU!</p>
                <button class="rd-more">Read more</button>
            </div>
        </div>
    </div>


</body>
