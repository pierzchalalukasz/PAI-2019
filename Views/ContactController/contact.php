<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="Public/css/contact.css" />
        <link rel="stylesheet" href="Public/css/navbar.css" />
        <title>Wallet Stats | Contact</title>
    </head>
    <body>
        <?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
        <div class="formContainer">
            <div class="contact-header">
                <div class="contact-header-text">
                    <span>Contact us</span>
                </div>
                <div class="contact-header-img">
                    <img id="contact-header-logo" src="Public/img/logo.svg"/>
                </div>
            </div>
            <form>
                <div class="inputWrapper">
                    <input type="text" name="e-mail" required />
                    <label for="e-mail" class="label-name">
                        <span class="content-name">e-mail</span>
                    </label>
                </div>
                <div class="inputWrapper">
                    <input type="text" name="subject" required />
                    <label for="subject" class="label-name">
                        <span class="content-name">Subject</span>
                    </label>
                </div>
                <div class="msg-body">
                    <textarea class="msg-body--area" cols="10" rows="4" name="msg-body--area" placeholder="Type message text here..." required></textarea>
                    <span class="msg-body--label">Message Body</span>
                    <span class="span-for-border"></span>
                </div>
                <button type="submit" class="btn--huge">SUBMIT</button>
            </form>
        </div>
    </body>
</html>