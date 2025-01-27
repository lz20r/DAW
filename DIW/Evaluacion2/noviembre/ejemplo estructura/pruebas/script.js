document.getElementById('generarCarta').addEventListener('click', () => {
	// Obtener valores del formulario
	const nombre = document.getElementById('nombre').value;
	const edad = document.getElementById('edad').value;
	const comportamiento = document.getElementById('comportamiento').value;
	const regalos = document.getElementById('regalos').value.split('\n');
	const mejoras = document.getElementById('mejoras').value.split('\n');

	// Validar campos obligatorios
	if (!nombre || !edad) {
		alert('Por favor, completa los campos de Nombre y Edad.');
		return;
	}

	// Insertar datos en la vista previa
	document.getElementById('cartaNombre').textContent = nombre;
	document.getElementById('cartaEdad').textContent = edad;
	document.getElementById('cartaComportamiento').textContent = comportamiento;
	document.getElementById('cartaFirma').textContent = nombre;

	const regalosList = document.getElementById('cartaRegalos');
	regalosList.innerHTML = '';
	regalos.forEach(regalo => {
		if (regalo.trim()) {
			const li = document.createElement('li');
			li.textContent = regalo;
			regalosList.appendChild(li);
		}
	});

	const mejorasList = document.getElementById('cartaMejoras');
	mejorasList.innerHTML = '';
	mejoras.forEach(mejora => {
		if (mejora.trim()) {
			const li = document.createElement('li');
			li.textContent = mejora;
			mejorasList.appendChild(li);
		}
	});

	// Mostrar la carta
	document.getElementById('vistaCarta').classList.remove('hidden');
});
