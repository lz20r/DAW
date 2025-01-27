// Crear el contenedor para la nieve
const snowContainer = document.createElement("div");
snowContainer.style.position = "fixed";
snowContainer.style.top = "0";
snowContainer.style.left = "0";
snowContainer.style.width = "100%";
snowContainer.style.height = "100%";
snowContainer.style.pointerEvents = "none"; // Permite interacción en el resto de la página
snowContainer.style.zIndex = "9999"; // Siempre visible
document.body.appendChild(snowContainer);

// Función para generar un copo de nieve
function createSnowflake() {
    const snowflake = document.createElement("div");
    snowflake.textContent = "❄"; // Copo de nieve
    snowflake.style.position = "absolute";
    snowflake.style.color = "white";
    snowflake.style.fontSize = `${Math.random() * 40 + 30}px`; // Tamaño aleatorio entre 30px y 70px
    snowflake.style.top = "0"; // Comienza desde la parte superior
    snowflake.style.left = `${Math.random() * 100}%`; // Posición horizontal aleatoria
    snowflake.style.opacity = Math.random(); // Opacidad aleatoria para efecto de profundidad
    snowflake.style.transition = `transform ${Math.random() * 5 + 3}s linear, opacity 1s`; // Animación suave
    snowContainer.appendChild(snowflake);

    // Animar el copo de nieve
    setTimeout(() => {
        snowflake.style.transform = `translateY(${window.innerHeight}px) rotate(${Math.random() * 360}deg)`;
        snowflake.style.opacity = "0"; // Se desvanece al final
    }, 50);

    // Eliminar el copo de nieve cuando termina la animación
    snowflake.addEventListener("transitionend", () => {
        snowflake.remove();
    });
}

// Generar copos de nieve de manera continua
setInterval(createSnowflake, 200); // Nuevo copo cada 200ms
