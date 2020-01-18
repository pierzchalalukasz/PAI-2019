<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="Public/css/forms.css" />
        <title>Wallet Stats | Sign up</title>
    </head>
    <body>
        <div class="container">
            <div class="form-wrapper">
                <div class="sign-header">
                    <span id="sign-header-text">Sign up</span>
                    <img id="sign-header-logo" src="Public/img/logo.svg"/>
                </div>
                <form action="?page=register" method="post" autocomplete="off">
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
                        <input type="text" name="name" autocomplete="off" required />
                        <label for="name" class="label-name">
                            <span class="content-name">Name</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="surname" autocomplete="off" required />
                        <label for="surname" class="label-name">
                            <span class="content-name">Surname</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="username" autocomplete="off" required />
                        <label for="username" class="label-name">
                            <span class="content-name">Username</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="email" autocomplete="off" required />
                        <label for="email" class="label-name">
                            <span class="content-name">E-mail</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="pass" autocomplete="off" required />
                        <label for="pass" class="label-name">
                            <span class="content-name">Password</span>
                        </label>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="repass" autocomplete="off" required />
                        <label for="repass" class="label-name">
                            <span class="content-name">Repeat password</span>
                        </label>
                    </div>
                    <button type="submit">SIGN UP</button>
                </form>
                <div class="sign-footer">
                    <span class="sign-span">Have you got an account yet?</span>
                    <a class="sign-link"href="?page=login"><span>Sign in »</span></a>
                </div>
            </div>
        </div>
    </body>
</html> 