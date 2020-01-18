<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="Public/css/forms.css" />
        <title>Wallet Stats | Sign in</title>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img class="logo-img" src="Public/img/logo.svg">
                <img class="logo-text" src="Public/img/walletstats.svg">
            </div>
            <div class="form-wrapper">
                <div class="sign-header">
                    <span id="sign-header-text">Sign in</span>
                    <img id="sign-header-logo" src="Public/img/logo.svg"/>
                </div>
                <form action="?page=login" method="post" autocomplete="off">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                    <div class="input-wrapper">
                        <input type="text" name="email" required />
                        <label for="email" class="label-name">
                            <span class="content-name">E-mail</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="password" required />
                        <label for="password" class="label-name">
                            <span class="content-name">Password</span>
                        </label>
                    </div>
                    <button id="login-submit" type="submit" name="submit">SIGN IN</button>
                </form>
                <div class="sign-footer">
                    <span class="sign-span">New to Wallet Stats?</span>
                    <a class="sign-link"href="?page=register"><span>Sign up »</span></a>
                </div>
                <p class="form-message"></p>
            </div>
        </div>
    </body>
</html> 