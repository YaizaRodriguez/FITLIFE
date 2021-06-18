<main class="contenedor seccion">
    <h1>Administrador</h1>

    <?php 
    if($resultado) {
        $mensaje = mostrarNotificacion( intval($resultado) ); 
        if($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
       <?php }
        }
    ?>

    <a href="/rutinas/crear" class="boton boton-verde">Nueva Rutina</a>
    <a href="/expertos/crear" class="boton boton-amarillo">Nuev@ Expert@</a>

    <h2>Rutinas</h2>
    <table class="rutinas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar Resultados de la BD -->
        <?php foreach( $rutinas as $rutina) :  ?>
        <tr>         
                <td><?php echo $rutina->id; ?> </td>
                <td><?php echo $rutina->titulo; ?> </td>
                <td> <img src="/imagenes/<?php echo $rutina->imagen; ?>" class="imagen-tabla"></td>
                <td><?php echo $rutina->precio ?>€</td>
                <td>
                    <form method="POST" class="w-100" action="/rutinas/eliminar">
                        <input type="hidden" name="id" value="<?php echo $rutina->id; ?>">
                        <input type="hidden" name="tipo" value="rutina">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    
                    <a href="/rutinas/actualizar?id=<?php echo $rutina->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Expertos</h2>
    <table class="rutinas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar Resultados de la BD -->
        <?php foreach( $expertos as $experto) :  ?>
        <tr>         
                <td><?php echo $experto->id; ?> </td>
                <td><?php echo $experto->nombre . " " . $experto->apellido; ?> </td>
                <td><?php echo $experto->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/expertos/eliminar">
                        <input type="hidden" name="id" value="<?php echo $experto->id; ?>">
                        <input type="hidden" name="tipo" value="experto">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    
                    <a href="expertos/actualizar?id=<?php echo $experto->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>