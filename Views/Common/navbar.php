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
        <ul class="nav-links">
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
<script>
    const navSlide = () =>  {
        const burger = document.getElementById('burger');
        const nav = document.querySelector('.nav-links');
        const navLinks = document.querySelectorAll('li');


        burger.addEventListener('click',()=>{
            nav.classList.toggle('nav-active');

            navLinks.forEach((link, index)  =>  {
                if(link.style.animation)    {
                    link.style.animation = ''
                }   else    {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + .5}s`;
                }
            });
            burger.classList.toggle('toggle');
        });
    }
    navSlide();
</script>