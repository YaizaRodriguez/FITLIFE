<?php

//Definicion de constantes.
                //Toma ubicacion del arichivo actual con la superglobal __DIR__ 
                //Toma ubicacion de templates y de las funciones

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate( string $nombre, bool $inicio = false) {  //Si $inicio no esta presente es = a falsa
    include TEMPLATES_URL . "/${nombre}.php";
}


function estaAutenticado() {

    session_start();

    if(!$_SESSION['login']){   //Si no esta autenticado el login, redirecciona a la pag principal.
        header('Location: /');
    }   
}

    function debuggear($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
    exit;
}

//Sanitizar el HMTL
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['experto', 'rutina'];

    return in_array($tipo, $tipos);
}

//Muestra mensajes
function mostrarNotificacion($codigo){
    $mensaje =  '';

    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url) {

   //Validación de url por un id valido.
   $id = $_GET['id'];
   $id = filter_var($id, FILTER_VALIDATE_INT); //Filtro para validar que es un entero.

   //Si no existe o es false, se redirecciona a una url.
   if (!$id) {  
    header("Location: ${url}");
   }   
   
   return $id;
}