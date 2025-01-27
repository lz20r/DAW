<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://node.cinnammon.es:2017/uploads/images/B917F2F3-11CC-472F-B944-BB2190B31D47.png" class="d-block w-100" alt="Producto 1">
        </div>
        <div class="carousel-item">
            <img src="http://node.cinnammon.es:2017/uploads/images/B917F2F3-11CC-472F-B944-BB2190B31D47.png" class="d-block w-100" alt="Producto 2">
        </div>
        <div class="carousel-item">
            <img src="http://node.cinnammon.es:2017/uploads/images/B917F2F3-11CC-472F-B944-BB2190B31D47.png" class="d-block w-100" alt="Producto 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    <div class="arrow-container">
        <a href="#sectionBajo" class="scroll-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
                <polyline points="6 15 12 21 18 15"></polyline>
            </svg>
        </a>
    </div>
</div>

<style> 
    .arrow-container {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        background-color: black;
        /* Fondo negro */
        padding: 10px;
        border-radius: 50%;
    }

    .scroll-arrow {
        display: inline-block;
        width: 40px;
        height: 40px;
        cursor: pointer;
        animation: moveUpDown 1.5s infinite;
        /* Movimiento de la flecha */
    }

    @keyframes moveUpDown {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
            /* Mover hacia arriba */
        }
    }

    .scroll-arrow span {
        display: block;
        position: absolute;
        width: 6px;
        height: 6px;
        background: white;
        border-radius: 50%;
        animation: bounce 1.5s infinite;
    }

    .scroll-arrow span:nth-child(1) {
        top: 0;
        left: 50%;
        animation-delay: 0s;
        transform: translateX(-50%);
    }

    .scroll-arrow span:nth-child(2) {
        top: 12px;
        left: 50%;
        animation-delay: 0.3s;
        transform: translateX(-50%);
    }

    .scroll-arrow span:nth-child(3) {
        top: 24px;
        left: 50%;
        animation-delay: 0.6s;
        transform: translateX(-50%);
    }

    @keyframes bounce {

        0%,
        100% {
            opacity: 0;
            transform: translateY(0) translateX(-50%);
        }

        50% {
            opacity: 1;
            transform: translateY(10px) translateX(-50%);
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const arrow = document.querySelector(".scroll-arrow");
        arrow.addEventListener("click", function(e) {
            e.preventDefault();
            const target = document.querySelector(arrow.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    });
</script>

<!-- Sección a la que apunta la flecha -->
<div id="sectionBajo" class="mt-5"></div>