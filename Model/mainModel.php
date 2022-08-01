<?php
if ($peticionAjax) {
    require_once "../Config/SERVER.php";
} else {
    require_once "./Config/SERVER.php";
}

class mainModel
{
    /*---------------funcion para conectar a la BD---------------- */
    protected static function conexionDB()
    {
        try {
            $conn = new PDO(SGBD, USER, PASS);
            //$conn->exec("SET CHARACTER SET utf-8");
            return $conn;
        } catch (PDOException $e) {
            die('Connection Failed: ' . $e->getMessage());
        }
    }

    /*---------------funcion para realizar consultas sencillas---------------- */
    protected static function ejecutarConsultasSimples($cadena)
    {
        $sql = self::conexionDB()->prepare($cadena);
        $sql->execute();
        return $sql;
    }


    /*---------------funcion para para encriptar---------------- */
    public  function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRETE_ID), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    /*---------------funcion para realizar desEncriptar---------------- */
    protected static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRETE_ID), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    /*---------------funcion para generar codigo aleatorio---------------- */
    protected static function generarCodigoAleatorio($letra, $longitud, $numero)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $aleatorio = rand(0, 9);
            $letra .= $aleatorio;
        }
        $letra .= "-" . $numero;
        return  $letra;
    }
}