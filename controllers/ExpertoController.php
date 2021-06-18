<?php

namespace Controllers;
use MVC\Router;
use Model\Experto;

class ExpertoController {

    public static function crear( Router $router ) {

        $errores = Experto::getErrores();
        $experto = new Experto;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') { 

            //Crear nueva instancia
            $experto = new Experto($_POST['experto']);
        
            //Validar que no haya campos vacios
            $errores = $experto->validar();

            //No hay errores
            if(empty($errores)){
                $experto->guardar();

            }
        }

        $router->render('expertos/crear', [
            'errores' => $errores,
            'experto' => $experto
        ]);
    }

    public static function actualizar(Router $router) {

        $errores = Experto::getErrores();
        $id = validarORedireccionar('/admin');

        //Obtener datos del experto a actualizar
        $experto = Experto::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') { 

            //Asignar los valores
            $args = $_POST['experto'];
        
            //Sincronizar objeto en memoria con lo que el usuario escribió
            $experto->sincronizar($args);
        
            //Validacion
            $errores = $experto->validar();
        
            if(empty($errores)){
                $experto->guardar();
            }
        }

        $router->render('expertos/actualizar', [
            'errores' => $errores,
            'experto' => $experto
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Validar el id.
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                //Validar el tipo a eliminar.
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $experto = Experto::find($id);
                    $experto->eliminar();
                }
            }
        }
    }
}