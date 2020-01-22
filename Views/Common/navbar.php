<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('<h2>You are not logged in!</h2>');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('<h2>You do not have permission to watch this page!<h2>');
    }
?>

<div class="nav-wrapper">
    <img class="light-wallet" src="Public/img/wallet-light.svg">
    <nav>
        <ul class="nav-links">
            <li class="username"><a class="username"><?=$_SESSION['username']?></a></li>
            <li><a href="?page=create-stats">MAKE A CHART</a></li>
            <li><a href="?page=profile">MY PROFILE</a></li>
            <li><a href="?page=contact">CONTACT</a></li>
            <?php if(in_array('ROLE_ADMIN', $_SESSION['role'])) {
                echo "<li><a href=\"?page=admin\">ADMIN PANEL</a></li>";    
            }?>
            <li id="logout"><a href="?page=logout">LOGOUT</a></li>
        </ul>
    </nav>
    <span class="logged-user"><?= $_SESSION['username'] ?></span>
    <form action="?page=logout" method="POST">
        <button id="btn-logout" class="btn-small" type="submit">LOGOUT</button>
    </form>
    <div id="burger">
        <div class="line-1"></div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
</div>