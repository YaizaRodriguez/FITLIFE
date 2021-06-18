<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php 
            if($mensaje) { ?>
                <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje ?></p>;
        <?php } ?>
        
        

        <picture>
            <source class="imagen-contacto" srcset="build/img/contacto.webp" type="image/webp">
            <source class="imagen-contacto" srcset="build/img/contacto.jpg" type="image/jpeg">
            <img class="imagen-contacto" loading="lazy" src="build/img/contacto.jpg" alt="Imagen Contacto">
        </picture>

        <h2 data-cy="heading-formulario">Formulario de Contacto</h2>

        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje:</label>
                <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Te informamos</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input data-cy="form-contacto"  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                    <label for="contactar-email">E-mail</label>
                    <input data-cy="form-contacto"  type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
                </div>

                <div id="contacto"></div>


            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
