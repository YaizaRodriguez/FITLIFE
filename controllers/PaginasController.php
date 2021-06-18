<?php 

namespace Controllers;
use MVC\Router;
use Model\Rutina;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index( Router $router ){

        $rutinas = Rutina::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'rutinas' => $rutinas,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros( Router $router ){

        $router->render('paginas/nosotros');
    }


    public static function rutinas( Router $router ){
        $rutinas = Rutina::all();
        $router->render('paginas/rutinas', [
            'rutinas' => $rutinas
        ]);
    }

    public static function rutina( Router $router ){

        $id = validarORedireccionar('/rutinas');

        //Buscar rutina por su id
        $rutina = Rutina::find($id);

        $router->render('paginas/rutina', [
            'rutina' => $rutina
        ]);
    }
   

    public static function nutricion( Router $router ){

        $router->render('paginas/nutricion');
    }

    public static function entrada( Router $router ){
        $router->render('paginas/entrada');
    }

    public static function contacto( Router $router ){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

           //Crear instancia de phpmailer
           $mail = new PHPMailer();

           //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '422112794a6de1';
            $mail->Password = '74028f040e6998';
            $mail->SMTPSecure = 'tls';



           //Configurar contenido del email
           $mail->setFrom('admin@fitlife.com');  //Quien envia el email.
           $mail->addAddress('admin@fitlife.com', 'FitLife.com');  //A que email va a llegar el correo.
           $mail->Subject = 'Nuevo Mensaje';

           //Habilitar HTML
           $mail->isHTML(true);
           $mail->CharSet = 'UTF-8';

           //Definir el contenido
           $contenido = '<html>';
           $contenido .= '<p>Tienes un nuevo mensaje</p>';
           $contenido .= '<p>Nombre: ' . $respuestas['nombre']   . ' </p>';
           

           //Enviar de forma condicional los campos de email o telefono
           if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por telefono</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono']   . ' </p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha']   . ' </p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora']   . ' </p>';
           } else {
               //Agregar campo de email
               $contenido .= '<p>Eligio ser contactado por email</p>';
               $contenido .= '<p>Email: ' . $respuestas['email']   . ' </p>';
           }

           $contenido .= '<p>Mensaje: ' . $respuestas['mensaje']   . ' </p>';
           $contenido .= '<p>Vía de contacto: ' . $respuestas['contacto']   . ' </p>';
           $contenido .= '</html>';

           $mail->Body = $contenido;
           $mail->AltBody = 'Esto es texto alternativo sin HTML';

           //Enviar el email
           if($mail->send()) {
               $mensaje = "Mensaje enviado";
           } else {
               $mensaje = "El mensaje no se pudo enviar";
           }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
 }