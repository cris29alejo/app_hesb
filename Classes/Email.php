<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;


class Email{

    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){

        //Crear el objeto de Email

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e90047fbf5a214';
        $mail->Password = '00088313534389';

        $mail->setFrom('cris29alejo@gmail.com');
        $mail->addAddress($this->email, 'https://murmuring-sea-87576.herokuapp.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ".$this->nombre . "</strong>, has creado tu cuenta en APP Hospital de Especialidades San Bartolo, solo debes cofirmarla presionando el siguiente enlace</p>";
        //$contenido .= "Presionando aquí: <a href='https://murmuring-sea-87576.herokuapp.com/confirmar-cuenta?token=" . $this->token . "'>Confimar Cuenta</a></p>";
        $contenido .= "Presionando aquí: <a href='http:localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confimar Cuenta</a></p>";
        $contenido .="<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }
    public function enviarInstrucciones(){
        //Crear el objeto de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e90047fbf5a214';
        $mail->Password = '00088313534389';

        $mail->setFrom('cris29alejo@gmail.com');
        $mail->addAddress($this->email, 'https://murmuring-sea-87576.herokuapp.com');
        $mail->Subject = 'Restablecer tu Contraseña';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ".$this->nombre . "</strong>, has solicitado restablecer tu contraseña,sigue el sigueinte enlace</p>";
        //$contenido .= "Presionando aquí: <a href='https://murmuring-sea-87576.herokuapp.com/recuperar?token=" . $this->token . "'>Restablecer Contraseña</a></p>";
        $contenido .= "Presionando aquí: <a href='http:localhost:3000/recuperar?token=" . $this->token . "'>Restablecer Contraseña</a></p>";
        $contenido .="<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }
}