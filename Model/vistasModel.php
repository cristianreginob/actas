<?php
class vistasModel
{
    /*------Modelo para obtener los programas--------*/
    protected static function getVistasModel($programa)
    {
        $listaValida = [
            "home", "actasList", "actasNew", "programasList", "programasNew",
            "userList", "userNew", "userUpdate", "compromisosNew", "compromisosList"
        ];
        if (in_array($programa, $listaValida)) {
            if (is_file("./View/" . $programa . "View.php")) {
                $contenido = "./View/" . $programa . "View.php";
            } else {
                $contenido = "404";
            }
        } else if ($programa == "login" || $programa == "index") {
            $contenido = "login";
        } else if ($programa == "userRegister") {
            $contenido = "userRegister";
        } else {
            $contenido = "404";
        }
        return  $contenido;
    }
}