<?php

if ($peticionAjax) {
    require_once "../Model/mainModel.php";
} else {
    require_once "./Model/mainModel.php";
}

class compromisosModel extends mainModel
{
    /*-----funcion agregar usuario-----*/
    protected static function addCompromisosModel($data)
    {
        $sql = mainModel::conexionDB()->prepare("INSERT INTO compromisos (descripcion, fecha_ini, fecha_fin, responsable, acta_id) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $data['descripcion']);
        $sql->bindParam(2, $data['fecha_ini']);
        $sql->bindParam(3, $data['fecha_fin']);
        $sql->bindParam(4, $data['responsable']);
        $sql->bindParam(5, $data['acta_id']);
        $sql->execute();
        return $sql;
    }
}