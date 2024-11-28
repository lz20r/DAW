// Selección de elementos para las acciones
const stopServerBtn = document.querySelector(".btn-danger");
const restartServerBtn = document.querySelector(".btn-success");
const addUserBtn = document.querySelector(".btn-primary");
const viewLogsBtn = document.querySelector(".btn-secondary");
const userList = document.querySelector(".list-group");

// Función para detener el servidor
stopServerBtn.addEventListener("click", () => {
    const confirmStop = confirm("¿Estás seguro de que deseas detener el servidor?");
    if (confirmStop) {
        // Simulación de solicitud al backend
        fetch("/api/stop-server", { method: "POST" })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Servidor detenido correctamente.");
                } else {
                    alert("Error al detener el servidor: " + data.message);
                }
            })
            .catch(error => console.error("Error al detener el servidor:", error));
    }
});

// Función para reiniciar el servidor
restartServerBtn.addEventListener("click", () => {
    const confirmRestart = confirm("¿Estás seguro de que deseas reiniciar el servidor?");
    if (confirmRestart) {
        // Simulación de solicitud al backend
        fetch("/api/restart-server", { method: "POST" })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Servidor reiniciado correctamente.");
                } else {
                    alert("Error al reiniciar el servidor: " + data.message);
                }
            })
            .catch(error => console.error("Error al reiniciar el servidor:", error));
    }
});

// Función para añadir usuario
addUserBtn.addEventListener("click", () => {
    const newUser = prompt("Introduce el nombre del nuevo usuario:");
    if (newUser && newUser.trim() !== "") {
        // Simulación de solicitud al backend
        fetch("/api/add-user", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username: newUser.trim() })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const userItem = document.createElement("li");
                    userItem.className = "list-group-item";
                    userItem.textContent = newUser.trim();
                    userList.appendChild(userItem);
                    alert(`Usuario "${newUser}" añadido correctamente.`);
                } else {
                    alert("Error al añadir usuario: " + data.message);
                }
            })
            .catch(error => console.error("Error al añadir usuario:", error));
    } else {
        alert("El nombre del usuario no puede estar vacío.");
    }
});

// Función para ver todos los logs
viewLogsBtn.addEventListener("click", () => {
    // Simulación de solicitud al backend
    fetch("/api/logs", { method: "GET" })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Logs recibidos:\n" + data.logs.join("\n"));
            } else {
                alert("Error al obtener los logs: " + data.message);
            }
        })
        .catch(error => console.error("Error al obtener los logs:", error));
});
