<?php

if ($peticionAjax) {
    require_once "../Model/mainModel.php";
} else {
    require_once "./Model/mainModel.php";
}

class programasModel extends mainModel
{
    /*-----funcion agregar usuario-----*/
    protected static function addProgramaModel($data)
    {
        $sql = mainModel::conexionDB()->prepare("INSERT INTO programa (nombre,facultad) VALUES (:nombre, :facultad)");
        $sql->bindParam(':nombre', $data['nombre']);
        $sql->bindParam(':facultad', $data['facultad']);
        $sql->execute();
        return $sql;
    }
}