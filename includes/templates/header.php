<?php

if(!isset($_SESSION)){
    session_start();
}

$auth = $_SESSION['login'] ?? false;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <script src="https://kit.fontawesome.com/2e9a379df8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/build/css/app.css">
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
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="entrenos.php">Entrenos</a>
                        <a href="nutricion.php">Nutricion</a>
                        <a href="tienda.php">Tienda</a>
                        <a href="contacto.php">Contacto</a>

                        <?php if($auth) : ?>
                            <a href="cerrarsesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                </nav>
                </div>
            </div>     
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';?>       
        </div>
    </header>