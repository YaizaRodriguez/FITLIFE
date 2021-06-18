<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITLIFE</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio  ? 'inicio' : '' ?>"> 
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                <h1><span>FIT</span>LIFE</h1>
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="barras menu responsive">
                </div>
                
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav data-cy="nav-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/rutinas">Entrenos</a>
                        <a href="/nutricion">Nutricion</a>
                        <a href="/tienda">Tienda</a>
                        <a href="/contacto">Contacto</a>

                        <?php if($auth) : ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>     
            <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Consigue tus Objetivos con FitLife</h1>" : ''; ?>       
        </div>
    </header>

    <?php echo $contenido; ?>



    <footer  class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="nav-footer" class="navegacion">
            <a href="/nosotros">Nosotros</a>
                        <a href="/rutinas">Entrenos</a>
                        <a href="/nutricion">Nutricion</a>
                        <a href="/tienda">Tienda</a>
                        <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p data-cy="copyright" class="copyright">Todos los Derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>