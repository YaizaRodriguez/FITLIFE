
<?php 

use App\Rutina;

if($_SERVER['SCRIPT_NAME'] === 'entrenos.php'){
    $rutinas = Rutina::all();
} else {
    $rutinas = Rutina::get(3);
}
 
?>

<div class="contenedor-anuncios">
    <?php foreach($rutinas as $rutina) { ?>
        <div class="anuncio"> 
                <img loading="lazy" src="/imagenes/<?php echo $rutina->imagen; ?>" alt="rutina">
                    
    
                    <div class="contenido-anuncio">
                        <h3><?php echo $rutina->titulo; ?></h3>
                        <p><?php echo $rutina->descripcion; ?></p>
                        <p class="precio">$ <?php echo $rutina->precio; ?></p>
    
                        <ul class="iconos-caracteristicas">
                            <li>
                                <img class="icono"  loading="lazy" src="build/img/weightlifting.svg" alt="icono1">
                                
                            </li>
                            <li>
                                <img class="icono"  loading="lazy" src="build/img/diana.svg" alt="icono2">
                                
                            </li>
                            <li>
                                <img class="icono"  loading="lazy" src="build/img/lotus.svg" alt="icono3">
                                
                            </li>
                        </ul>
    
                        <a href="entreno.php?id=<?php echo $rutina->id;?>" class="boton-amarillo-block">
                            Ver Entrenamiento
                        </a>
    
                    </div>  <!-- .contenido-anuncio -->
                </div> <!-- .anuncio -->
        <?php } ?>
</div>  <!-- .contenedor-anuncios -->
