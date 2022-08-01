<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['identificacion']) || isset($_POST['id_delete'])) {

	/*--------- Instancia al controlador ---------*/
	require_once "../Controller/usuarioController.php";
	$ins_usuario = new usuarioController();
	/*--------- Agregar un usuario ---------*/
	if (isset($_POST['identificacion'])) {
		echo $ins_usuario->addUserController();
	}

	if (isset($_POST['id_delete'])) {
		echo $ins_usuario->deleteUserController();
	}
} else {
	session_start(['name' => 'MVC']);
	session_unset();
	session_destroy();
	header("Location: " . SERVERURL . "login/");
	exit();
}