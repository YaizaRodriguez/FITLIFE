<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    //Método para todas las url que reaccionen a GET.
    //Array que se llenará con las url y sus funciones asociadas.
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }


    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }


    //comprobarRutas() -> Comprueba que las rutas esten definidas en el router y valida en tipo de request.
    public function comprobarRutas(){ 

        session_start();
        $auth = $_SESSION['login'] ?? null;


        //Array de rutas proyegidas
        $rutasProtegidas = ['/admin', 
                            'rutinas/crear',
                            'rutinas/actualizar',
                            'rutinas/eliminar', 
                            'expertos/crear', 
                            'expertos/actualizar', 
                            'expertos/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';  //Leer URL actual. Filtra segun la url que se visite en cada momento y obtiene la funcion asociada a ella.
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null; //Accede al array de rutasGET con la urlActual que se lee en PATH_INFO
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas
        if(in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            //La URL existe y tiene una funcion asociada.
            call_user_func($fn, $this);
        } else {
            echo 'Página no encontrada';
        }
    }

    //Muestra una vista
    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {  //Itera y genera variables con el nombre de los keys del array asociativo que le pasamos hacia la vista.
            $$key = $value;
        }

        ob_start(); //Inicia almacenamiento en memoria.   

        include __DIR__ . "/views/$view.php"; //Busca la vista que se le pase, y remplazarla por el nombre de esta .php.
        $contenido = ob_get_clean();  //Limpia la memoria.
        include __DIR__ . "/views/layout.php";
    }

}