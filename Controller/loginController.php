<?php
if ($peticionAjax) {
    require_once "../Model/loginModel.php";
} else {
    require_once "./Model/loginModel.php";
}

class loginController extends loginModel
{

    public function goLoginController()
    {
        $username =  $_POST['username'];
        $password = mainModel::encryption($_POST['password']);

        /*== comprobar campos vacios ==*/
        if ($username == "" || $password == "") {
            echo '
              <script>
                Swal.fire({
                    title: "Ocurrio un error",
                    text: "Debe llenar todos los campos",
                    type: "error",
                    confirmButtonText: "Aceptar",
                });
              </script>
            ';
            exit();
        }

        $data = [
            "username" => $username,
            "password" => $password
        ];

        $respuesta = loginModel::goLoginModel($data);
        if ($respuesta->rowCount() == 1) {
            $rowLogin = $respuesta->fetch();
            session_start(['name' => 'MVC']);
            $_SESSION['id_MVC'] =  $rowLogin['identificacion'];
            $_SESSION['nombres_MVC'] =  $rowLogin['nombres'];
            $_SESSION['apellidos_MVC'] =  $rowLogin['apellidos'];
            $_SESSION['username_MVC'] =  $rowLogin['username'];
            $_SESSION['token_MVC'] =  md5(uniqid(mt_rand(), true));
            return header("Location: " . SERVERURL . "home/");
        } else {
            echo '
              <script>
                Swal.fire({
                    title: "Ocurrio un error",
                    text: "Usuario o clave incorrectos",
                    type: "error",
                    confirmButtonText: "Aceptar",
                });
              </script>
            ';
            exit();
        }
    }
    public function  forzarCierreSession()
    {
        session_unset();
        session_destroy();
        if (headers_sent()) {
            return "<script>windows.location.href='" . SERVERURL . "login/';</script>";
        } else {
            return header("Location: " . SERVERURL . "login/");
        }
    }

    public function  cierreSession()
    {
        session_start(['name' => 'MVC']);
        $token = mainModel::decryption($_POST['token']);
        $username = mainModel::decryption($_POST['username']);
        if ($token == $_SESSION['token_MVC'] && $username == $_SESSION['username_MVC']) {
            session_unset();
            session_destroy();
            $alerta = [
                "Alerta" => "redireccionar",
                "URL" => SERVERURL . "login/"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "No se pudo cerra la sesion en el sistema",
                "tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }
}