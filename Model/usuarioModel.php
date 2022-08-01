<?php
if ($peticionAjax) {
	require_once "../Model/mainModel.php";
} else {
	require_once "./Model/mainModel.php";
}


class usuarioModel extends mainModel
{

	/*--------- Modelo agregar usuario ---------*/
	protected static function addUserModel($datos)
	{
		$sql = mainModel::conexionDB()->prepare("INSERT INTO usuario(identificacion, nombres, apellidos, email, username, password, tipo, estado) VALUES (:identificacion, :nombres, :apellidos, :email, :username, :password, :tipo, :estado)");

		$sql->bindParam(':identificacion', $datos['identificacion']);
		$sql->bindParam(':nombres', $datos['nombres']);
		$sql->bindParam(':apellidos', $datos['apellidos']);
		$sql->bindParam(':email', $datos['email']);
		$sql->bindParam(':username', $datos['username']);
		$sql->bindParam(':password', $datos['password']);
		$sql->bindParam(':tipo', $datos['tipo']);
		$sql->bindParam(':estado', $datos['estado']);
		$sql->execute();
		return $sql;
	}

	protected static function deleteUsuarioModel($id)
	{
		$sql = mainModel::conexionDB()->prepare("DELETE FROM usuario WHERE identificacion = :id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		return $sql;
	}

	protected static function updateUsuarioModel($id)
	{
		$sql = mainModel::conexionDB()->prepare("UPDATE usuario SET WHERE identificacion = :id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		return $sql;
	}
}