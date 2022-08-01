<?php
if ($peticionAjax) {
	require_once "../Model/usuarioModel.php";
} else {
	require_once "./Model/usuarioModel.php";
}

class usuarioController extends usuarioModel
{

	/*--------- Controlador agregar usuario ---------*/
	public function addUserController()
	{
		$identificacion =  $_POST['identificacion'];
		$nombres =  $_POST['nombres'];
		$apellidos =  $_POST['apellidos'];
		$email =  $_POST['email'];
		$username =  $_POST['username'];
		$password = mainModel::encryption($_POST['password']);
		$tipo =  $_POST['tipo'];



		/*== comprobar campos vacios ==*/
		if ($identificacion == "" || $nombres == "" || $apellidos == "" || $username == "" || $password == "" || $email == "") {
			$alerta = [
				"Alerta" => "simple",
				"titulo" => "Ocurrió un error inesperado",
				"texto" => "No has llenado todos los campos que son obligatorios",
				"tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}
		/*== Comprobando usuario ==*/
		$check_user = mainModel::ejecutarConsultasSimples("SELECT username FROM usuario WHERE username='$username'");
		if ($check_user->rowCount() > 0) {
			$alerta = [
				"Alerta" => "simple",
				"titulo" => "Ocurrió un error inesperado",
				"texto" => "El NOMBRE DE USUARIO ingresado ya se encuentra registrado en el sistema",
				"tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		/*== Comprobando email ==*/
		if ($email != "") {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$check_email = mainModel::ejecutarConsultasSimples("SELECT email FROM usuario WHERE email='$email'");
				if ($check_email->rowCount() > 0) {
					$alerta = [
						"Alerta" => "simple",
						"titulo" => "Ocurrió un error inesperado",
						"texto" => "El EMAIL ingresado ya se encuentra registrado en el sistema",
						"tipo" => "error"
					];
					echo json_encode($alerta);
					exit();
				}
			} else {
				$alerta = [
					"Alerta" => "simple",
					"titulo" => "Ocurrió un error inesperado",
					"texto" => "Ha ingresado un correo no valido",
					"tipo" => "error"
				];
				echo json_encode($alerta);
				exit();
			}
		}

		/*== Comprobando privilegio ==*/
		if ($tipo < 1 || $tipo > 3) {
			$alerta = [
				"Alerta" => "simple",
				"titulo" => "Ocurrió un error inesperado",
				"texto" => "El privilegio seleccionado no es valido",
				"tipo" => "error"
			];
			echo json_encode($alerta);
			exit();
		}

		$datos = [
			"identificacion" => $identificacion,
			"nombres" => $nombres,
			"apellidos" => $apellidos,
			"email" => $email,
			"username" => $username,
			"password" => $password,
			"tipo" => $tipo,
			"estado" => 1
		];
		$agregar_usuario = usuarioModel::addUserModel($datos);
		if ($agregar_usuario->rowCount() == 1) {
			$alerta = [
				"Alerta" => "limpiar",
				"titulo" => "usuario registrado",
				"texto" => "Los datos del usuario han sido registrados con exito",
				"tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"titulo" => "Ocurrió un error inesperado",
				"texto" => "No hemos podido registrar el usuario",
				"tipo" => "error"
			];
		}
		echo json_encode($alerta);
	} /* Fin controlador */

	public function getusuariosController()
	{
		$consulta = "SELECT * FROM usuario";
		$datos = mainModel::conexionDB()->query($consulta);
		$datos = $datos->fetchAll();
		$table = "";
		$table .= '<div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>IDENTIFICACION</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>EMAIL</th>
					<th>USERNAME</th>
					<th>PASSWORD</th>
					<th>TIPO</th>
					<th>ESTADO</th>
					<th colspan="2">ACCION</th>
                </tr>
            </thead>
            <tbody>';

		foreach ($datos as $row) {
			$table .= ' <tr class="text-center">
            <td>' . $row['identificacion'] . '</td>
            <td>' . $row['nombres'] . '</td>
            <td>' . $row['apellidos'] . '</td>
			<td>' . $row['email'] . '</td>
			<td>' . $row['username'] . '</td>
			<td>' . $row['password'] . '</td>
			<td>' . $row['tipo'] . '</td>
			<td>' . $row['estado'] . '</td>
			<td>
			</td>
            <td>
				<form class="FormularioAjax" action="' . SERVERURL . 'Ajax/usuarioAjax.php" method="POST" data-form="delete">
					<input type="hidden" name="id_delete" value="' . mainModel::encryption($row['identificacion']) . '">
					<button type="subtmit" class="btn btn-warning">
						<i class="far fa-trash-alt"></i>
					</button>
				</form>
            </td>
        </tr>';
		}

		$table .= ' </tbody></table></div>';

		return $table;
	}

	public function deleteUserController()
	{
		$id = mainModel::decryption($_POST['id_delete']);
		$respuesta = usuarioModel::deleteUsuarioModel($id);
		if ($respuesta->rowCount() == 1) {
			$alerta = [
				"Alerta" => "recargar",
				"titulo" => "usuario eliminado",
				"texto" => "Los datos del usuario han sido elimados con exito",
				"tipo" => "success"
			];
		} else {
			$alerta = [
				"Alerta" => "simple",
				"titulo" => "Error",
				"texto" => "No se pudo eliminar el usurio",
				"tipo" => "error"
			];
		}
		echo json_encode($alerta);
	}
}