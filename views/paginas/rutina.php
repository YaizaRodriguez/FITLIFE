<main class="contenedor seccion contenido-centrado anuncio_p">
        <h1 data-cy="titulo-rutina"><?php echo $rutina->titulo; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $rutina->imagen; ?>" alt="anuncio">
       

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $rutina->precio; ?>€</p>
        </div>

        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/weightlifting.svg" alt="icono1">  
            </li>
            <li>
                <img loading="lazy" src="build/img/diana.svg" alt="icono2">              
            </li>
            <li>
                <img loading="lazy" src="build/img/lotus.svg" alt="icono3">                
            </li>
        </ul>

        <p><?php echo $rutina->descripcion; ?></p>

    </main>
