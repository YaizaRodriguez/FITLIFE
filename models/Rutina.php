<?php

namespace Model;

class Rutina extends clasePadre {

    protected static $tabla = 'rutinas';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 
    'descripcion', 'material', 'tiempo', 'creado', 'expertoId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $material;
    public $tiempo;
    public $creado;
    public $expertoId;

     
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';        
        $this->material = $args['material'] ?? '';
        $this->tiempo = $args['tiempo'] ?? '';
        $this->creado = date('Y/m/d');
        $this->expertoId = $args['expertoId'] ?? '';
    }

    public function validar(){
 
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
         }

         if(!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if( strlen( $this->descripcion ) < 50) {
            self::$errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }

        if(!$this->material) {
            self::$errores[] = "Debes añadir un numero de materiales";
        }

        if(!$this->tiempo) {
            self::$errores[] = "Debes añadir un tiempo";
        }

        if(!$this->expertoId) {
            self::$errores[] = "Debes añadir un experto";
        }

        if(!$this->imagen) {
            self::$errores[] = "La imagen de la rutina es obligatoria";
        }
   
         return self::$errores;
    }
}