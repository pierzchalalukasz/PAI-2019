<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>

<div class="nav-wrapper">
    <img class="light-wallet" src="Public/img/wallet-light.svg">
    <nav>
        <ul>
            <li><a href="?page=stats">MY STATS</a></li>
            <li><a href="?page=create-stats">UPLOAD A FILE</a></li>
            <li><a href="#">CONTACT</a></li>
            <?php if(in_array('ROLE_ADMIN', $_SESSION['role'])) {
                echo "<li><a href=\"?page=admin\">ADMIN PANEL</a></li>";    
            }?>
        </ul>
    </nav>
    <span class="logged-user"><?= $_SESSION['username'] ?></span>
    <form action="?page=logout" method="POST">
        <button class="btn-small" type="submit">LOGOUT</button>
    </form>
</div>