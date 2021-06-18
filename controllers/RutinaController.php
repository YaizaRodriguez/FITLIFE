<?php

namespace Controllers;
use MVC\Router;
use Model\Rutina;
use Model\Experto; 
use Intervention\Image\ImageManagerStatic as Image;

class RutinaController {
    public static function index(Router $router) {  //Con static no se requiere crear una nueva instancia.
        
        $rutinas = Rutina::all();   //Consulta a BD y trae todas las rutinas.
        $expertos = Experto::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        
        
        $router->render('rutinas/admin', [  //Se pasa hacia la vista. 
           'rutinas' => $rutinas, 
           'resultado' => $resultado,
           'expertos' => $expertos
        ]); 
    }

    public static function crear(Router $router) {

        $rutina = new Rutina; //Nueva instancia de objeto vacío.
        $expertos = Experto::all();
           
        $errores = Rutina::getErrores(); //Array con mensajes de error.

        if($_SERVER['REQUEST_METHOD'] === 'POST') {  //Valida que el metodo POST no este vacio


            //Crea nueva instancia de rutina. 
            $rutina = new Rutina($_POST['rutina']); 
    
            /*Subida de archivos*/
    
             //Generar nombre unico
             $nombreImagen = md5( uniqid( rand(), true )) . ".jpg"; //Guarda el nombre unico y la extension del archivo que se guardará en la bd.
    
             //Settear imagen
             //Resize a la imagen con intervention image
             if($_FILES['rutina']['tmp_name']['imagen']){
                 $image = Image::make($_FILES['rutina']['tmp_name']['imagen'])->fit(800,600); 
                 $rutina->setImagen($nombreImagen);
             }
             
    
             //Validar
             $errores = $rutina->validar();
        
            if(empty($errores)){
    
                //Crear carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guardar imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guarda en la bd.
                 $rutina->guardar();
                }    
       }

        $router->render('rutinas/crear', [ //Pasamos la instancia hacia la vista.
            'rutina' => $rutina,
            'expertos' => $expertos,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');
        $rutina = Rutina::find($id);
        $expertos = Experto::all();
        $errores = Rutina::getErrores();

           //Método POST para actualizar.
        if($_SERVER['REQUEST_METHOD'] === 'POST') { 

            //Asignar los atributos
            $args = $_POST['rutina'];

            $rutina->sincronizar($args);

            //Validacion 
            $errores = $rutina->validar();

            //Subida de archivos
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg"; //Genera nombre unico

            if($_FILES['rutina']['tmp_name']['imagen']){
                $image = Image::make($_FILES['rutina']['tmp_name']['imagen'])->fit(800,600); 
                $rutina->setImagen($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES['rutina']['tmp_name']['imagen']) {
                    //Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            $rutina->guardar(); 
        }    
}

        $router->render('/rutinas/actualizar', [
            'rutina' => $rutina,
            'errores' => $errores,
            'expertos' => $expertos
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
                $tipo = $_POST['tipo'];
    
                if(validarTipoContenido($tipo)) {
                    $rutina = Rutina::find($id);
                    $rutina->eliminar();
                }
            }   
        }
    }
}