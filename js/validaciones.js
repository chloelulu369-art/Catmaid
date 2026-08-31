document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form[data-validar="true"]');

    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const nombre = form.querySelector('[name="nombre"]');
            const edad = form.querySelector('[name="edad"]');
            const genero = form.querySelector('[name="genero"]');
            const telefono = form.querySelector('[name="telefono"]');
            const historia = form.querySelector('[name="historia"]');
            const direccion = form.querySelector('[name="direccion"]');

            if (!nombre || !edad || !genero || !telefono || !historia || !direccion) {
                return;
            }

            if (!nombre.value.trim() || !edad.value || !genero.value || !telefono.value.trim() || !historia.value.trim() || !direccion.value.trim()) {
                event.preventDefault();
                alert('Por favor, completa todos los campos obligatorios.');
                return;
            }

            if (Number(edad.value) < 0 || Number(edad.value) > 30) {
                event.preventDefault();
                alert('La edad del gato debe estar entre 0 y 30 años.');
                return;
            }

            const telefonoValor = telefono.value.trim();
            if (telefonoValor.length < 8 || telefonoValor.length > 15) {
                event.preventDefault();
                alert('El teléfono debe tener entre 8 y 15 caracteres.');
            }
        });
    });
});
