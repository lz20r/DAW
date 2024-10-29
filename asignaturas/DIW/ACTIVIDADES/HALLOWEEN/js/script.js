function toggleMenu() {
// onclick="toggleMenu()"
    
    var menuToggle = document.querySelector('.menu-icon');
    var menu = document.querySelector('.menu');
    menuToggle.classList.toggle('active');
    menu.classList.toggle('active');
}
