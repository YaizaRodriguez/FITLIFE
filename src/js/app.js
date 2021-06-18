document.addEventListener('DOMContentLoaded', function() {  //Espera que se ejecute todo el documento, y ejecuta la funcion. Callback.
    eventListeners();
    darkMode();
    //iniciarApp();
});

function darkMode() {

    const preferenciaDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
      //Preferencia de SO del usuario. Automaticamente abre el dark mode si esta predefinido.
    if(preferenciaDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    preferenciaDarkMode.addEventListener('change', function() {  //Lee las preferencias de usuairo si este las cambia.
        
        if(preferenciaDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');  //Coge la clase .mobile-menu del documento html.
    mobileMenu.addEventListener('click', navegacionResponsive); //Al hacer click, se llama a la funcion navegacionResponsive

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))
}



function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar')  //Otra forma. Con toggle -> si no tiene la clase la pone, y si la tiene la quita. Mas limpia.
    /*
    if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }*/
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número de Teléfono</label>
            <input data-cy="input-telefono" type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

            
            <p>Elija fecha y hora para la llamada</p>

            <label for="fecha">Fecha:</label>
            <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input data-cy="input-email" type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }

    
}

