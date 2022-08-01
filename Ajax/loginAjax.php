<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['token']) && isset($_POST['username'])) {
	/*--------- Instancia al controlador ---------*/
	require_once "../Controller/loginController.php";
	$ins_login = new loginController();
	echo $ins_login->cierreSession();
} else {
	session_start(['name' => 'MVC']);
	session_unset();
	session_destroy();
	header("Location: " . SERVERURL . "login/");
	exit();
}