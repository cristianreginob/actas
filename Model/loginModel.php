<?php
if ($peticionAjax) {
	require_once "../Model/mainModel.php";
} else {
	require_once "./Model/mainModel.php";
}


class loginModel extends mainModel
{
	protected static function goLoginModel($data)
	{
		$sql = mainModel::conexionDB()->prepare("SELECT *  FROM usuario WHERE username = :username and password = :password and estado = 1");
		$sql->bindParam(':username', $data['username']);
		$sql->bindParam(':password', $data['password']);
		$sql->execute();
		return $sql;
	}
}