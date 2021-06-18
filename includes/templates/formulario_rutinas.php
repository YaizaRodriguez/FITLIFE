<fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="rutina[titulo]" placeholder="Titulo Rutina" value="<?php echo s( $rutina->titulo ); ?>">  <!-- El name permite leer lo que el usuario escriba -->

            <label for="precio">Precio: </label>
            <input type="number" id="precio" name="rutina[precio]" placeholder="Precio Rutina" value="<?php echo s( $rutina->precio); ?>">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="rutina[imagen]">

            <?php if($rutina->imagen) : ?>
                <img src="/imagenes/<?php echo $rutina->imagen ?>" class="imagen-small">
            <?php endif; ?>

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="rutina[descripcion]"><?php echo s( $rutina->descripcion ); ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la Rutina</legend>

            <label for="material">Material: </label>
            <input type="text" id="material" name="rutina[material]" placeholder="Ej: Pesas" value="<?php echo s( $rutina->material ) ; ?>">

            <label for="tiempo">Tiempo: </label>
            <input type="text" id="tiempo" name="rutina[tiempo]" placeholder="tiempo" placeholder="Ej: 3 Meses" value="<?php echo s( $rutina->tiempo ) ; ?>">
        </fieldset>

        <fieldset>
            <legend>Experto</legend>

                <label for="experto">Experto</label>
                <select name="rutina[expertoId]" id="experto">
                <option selected value="">-- Seleccione --</option>
                <?php foreach($expertos as $experto) {?>
                    <option 
                    <?php echo $rutina->expertoId === $experto->id ? 'selected' : ''; ?>
                     value="<?php echo s($experto->id) ?>"> <?php echo s($experto->nombre) . " " . s($experto->apellido); ?> </option>
                <?php } ?>
                </select>
        </fieldset>

