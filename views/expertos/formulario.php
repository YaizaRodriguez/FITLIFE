<fieldset>
    <legend>Informacion general</legend>

    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="experto[nombre]" placeholder="Nombre Experto" value="<?php echo s( $experto->nombre ); ?>">
    
    <label for="apellido">Apellido: </label>
    <input type="text" id="apellido" name="experto[apellido]" placeholder="Apellido Experto" value="<?php echo s( $experto->apellido ); ?>">

</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>

    <label for="telefono">Telefono: </label>
    <input type="text" id="telefono" name="experto[telefono]" placeholder="Telefono Experto" value="<?php echo s( $experto->telefono ); ?>">

</fieldset>
