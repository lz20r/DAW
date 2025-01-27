document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector("#navbarNav");

    toggleButton.addEventListener("click", function () {
        const isCollapsed = this.classList.toggle("collapsed");
        navbarCollapse.classList.toggle("show", !isCollapsed);
    });

    // Ocultar el menú al hacer clic en cualquier enlace del menú
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            navbarCollapse.classList.remove("show");
            toggleButton.classList.add("collapsed");
        });
    });
});

