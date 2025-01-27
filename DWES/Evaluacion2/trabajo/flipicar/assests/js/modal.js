document.addEventListener('DOMContentLoaded', function() {
        const diasInput = document.getElementById('dias');
        const diasSeleccionados = document.getElementById('diasSeleccionados');
        const precioElement = document.getElementById('precio');
        const marcaModeloSelect = document.getElementById('marcaModelo');
        const modeloSeleccionado = document.getElementById('modeloSeleccionado');
        const detallesCoche = document.getElementById('detallesCoche');
        const kmsIncluidosElement = document.getElementById('kmsIncluidos');

        let kmsIncluidos = 150;
        let depositoGarantia = 0;
        let costoKmExtra = 0;

        // Actualizar detalles y calcular precio al cambiar el vehículo
        marcaModeloSelect.addEventListener('change', function() {
            const selectedOption = marcaModeloSelect.options[marcaModeloSelect.selectedIndex];
            kmsIncluidos = parseInt(selectedOption.getAttribute('data-kms')) || 150;
            depositoGarantia = parseInt(selectedOption.getAttribute('data-deposito')) || 0;
            costoKmExtra = parseFloat(selectedOption.getAttribute('data-extra')) || 0;

            modeloSeleccionado.textContent = selectedOption.textContent || "Modelo no seleccionado";
            kmsIncluidosElement.textContent = kmsIncluidos;
            detallesCoche.innerHTML = `
            Depósito de garantía: ${depositoGarantia}€<br>
            Kms. extra: ${costoKmExtra}€/km
        `;
            actualizarPrecio();
        });

        // Actualizar precio al cambiar los días
        diasInput.addEventListener('input', function() {
            diasSeleccionados.textContent = `Cantidad: ${diasInput.value}`;
            actualizarPrecio();
        });

        // Calcular y actualizar el precio
        function actualizarPrecio() {
            const dias = parseInt(diasInput.value);
            const precioTotal = kmsIncluidos * dias;

            if (isNaN(precioTotal)) {
                precioElement.textContent = '0€';
            } else {
                precioElement.textContent = `${precioTotal.toFixed(2)}€`;
            }
        } 
    });