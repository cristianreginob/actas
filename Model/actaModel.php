<?php

if ($peticionAjax) {
    require_once "../Model/mainModel.php";
} else {
    require_once "./Model/mainModel.php";
}

class actaModel extends mainModel
{
    /*-----funcion agregar usuario-----*/
    protected static function addActaModel($data)
    {
        $sql = mainModel::conexionDB()->prepare("INSERT INTO acta (asunto,fecha,descripcion,responsable,programa_id) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $data['asunto']);
        $sql->bindParam(2, $data['fecha']);
        $sql->bindParam(3, $data['descripcion']);
        $sql->bindParam(4, $data['responsable']);
        $sql->bindParam(5, $data['programa_id']);
        $sql->execute();
        return $sql;
    }

    protected static function deleteActaModel($id)
    {
        $sql = mainModel::conexionDB()->prepare("DELETE FROM acta WHERE identificacion = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql;
    }
}