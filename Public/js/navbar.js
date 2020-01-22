$(document).ready(function () {
    const burger = document.getElementById('burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('li');


    burger.addEventListener('click',() => {
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
);