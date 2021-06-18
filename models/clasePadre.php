<?php 

namespace Model;

class clasePadre {

     //BASE DE DATOS
     protected static $db;
     protected static $columnasDB = [];
     protected static $tabla = '';
 
     //Errores / Validación
     protected static $errores = [];
 
 
     //Definir la conexión a la base de datos
     public static function setDB($database){
         self::$db = $database;
     }

     public function guardar() {
 
         if(!is_null($this->id)) {
             //Actualizar
             $this->actualizar();
         } else {
             //Crear nuevo registro
             $this->crear();
         }
     }
 
     //Método guardar().
     public function crear() {
 
         //Sanitizar datos
         $datos = $this->sanitizarDatos();
 
            //Insertar en la bd
         $query = " INSERT INTO ". static::$tabla . " ( ";
         $query .=  join(', ', array_keys($datos));
         $query .= " ) VALUES (' ";
         $query .= join("', '", array_values($datos));
         $query .= " ') ";
 
         $resultado = self::$db->query($query);

         //Mensaje de exito. 
          if ($resultado) {
             header('Location: /admin?resultado=1');  //Redirecciona al usuario para que no se dupliquen datos. No puede ponerse si no hay nada de html previo. 
         }
     }
 
     public function actualizar(){
          //Sanitizar datos
          $datos = $this->sanitizarDatos();
 
          $valores = [];
          foreach($datos as $key => $value) {
             $valores[] = "{$key}='{$value}'";
          }
 
          $query = "UPDATE ". static::$tabla . " SET "; 
          $query .= join(', ', $valores);
          $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "'";
          $query .= " LIMIT 1 ";
          
          $resultado = self::$db->query($query);
          
          if ($resultado) {
             header('Location: /admin?resultado=2');  //Redirecciona al usuario para que no se dupliquen datos. No puede ponerse si no hay nada de html previo.
               
             }
     }
 
     //Eliminar un registro
     public function eliminar(){
          $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
          $resultado = self::$db->query($query);
 
         if ($resultado){
             $this->borrarImagen();
             header('Location: /admin?resultado=3');
         }
     }
 
 
     //Identifica y une los atributos/columnas de la base de datos
     public function datos(){ 
         $datos = [];
         foreach(static::$columnasDB as $columna){
             if($columna === 'id') continue;
             $datos[$columna] = $this->$columna;
         }
         return $datos;
     }
 
     public function sanitizarDatos(){  //Sanitiza los datos de columnasDB
         $datos = $this->datos();        
         $sanitizado = [];
         
         foreach($datos as $key => $value ) {
             $sanitizado[$key] =  self::$db->escape_string($value);
         }
 
         return $sanitizado;
     }
 
 
     //Subir archivos
     public function setImagen($imagen){
 
         //Elimina la imagen previa
         if(!is_null ($this->id)) {
             $this->borrarImagen(); 
         }
 
         //Asignar al atributo de imagen el nombre de la imagen
         if($imagen){
             $this->imagen = $imagen;
         }
     }
 
     //Eliminar archivo
     public function borrarImagen() {
         //Comprobar si existe el archivo
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
         if($existeArchivo) {
             unlink(CARPETA_IMAGENES . $this->imagen);
         }
     }
 
     
     //Validación
     public static function getErrores(){
         return static::$errores;
     }
 
     public function validar(){
        static::$errores = [];  //Limpiar array y crear nuevos errores.
        return static::$errores;
     }
 
     //Lista de todos los registros
     public static function all() {
         $query = "SELECT * FROM " . static::$tabla;

         $resultado = self::consultarSQL($query);
         return $resultado;
     }

     //Obtiene X numero de registros.
     public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;


        $resultado = self::consultarSQL($query);
        return $resultado;
    }
 
     //Busca un registro por su id
     public static function find($id) {
         $query = "SELECT * FROM ". static::$tabla . " WHERE id = ${id}";
         $resultado = self::consultarSQL($query);
 
         return array_shift( $resultado );
     }
 
     public static function consultarSQL($query){
 
         //Consultar BD.
         $resultado = self::$db->query($query);
 
         //Iterar los resultados.
         $array = [];
         while($registro = $resultado->fetch_assoc()) {
             $array[] = static::crearObjeto($registro);
         }
 
         //Liberar la memoria.
         $resultado->free();
 
         //Retornar resultados.
         return $array;
     }
 
     protected static function crearObjeto($registro) {
         $objeto = new static;
 
         foreach($registro as $key => $value){
             if( property_exists($objeto, $key )) {
                 $objeto->$key = $value;
             }
         }
 
         return $objeto;
     }
 
 
     //Sincroniza el objeto en memoria con los cambios realizados por el usuario
     public function sincronizar( $args = [] ) {
         foreach($args as $key => $value) {
             if(property_exists($this, $key ) && !is_null($value)) {
                 $this->$key = $value;
             }
         }
     }
}