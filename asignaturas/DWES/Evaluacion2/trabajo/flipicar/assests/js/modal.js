document.getElementById('dias').addEventListener('input', function () {
    document.getElementById('diasSeleccionados').innerText = "Cantidad: " + this.value;
});

document.getElementById('marcaModelo').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    document.getElementById('modeloSeleccionado').innerText = selectedOption.text;
});
