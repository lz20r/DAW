function loadModal(modalContainerId, contentUrl) {
    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = "<p>Cargando...</p>"; // Mensaje de carga

    // Carga el contenido del modal desde la URL especificada
    fetch(contentUrl)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Error al cargar el contenido del modal.");
            }
            return response.text();
        })
        .then((html) => {
            modalContent.innerHTML = html;
            const modal = new bootstrap.Modal(document.getElementById("productModal"));
            modal.show();
        })
        .catch((error) => {
            modalContent.innerHTML = `<p>Error: ${error.message}</p>`;
        });
}