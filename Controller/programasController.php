<?php
if ($peticionAjax) {
    require_once "../Model/programasModel.php";
} else {
    require_once "./Model/programasModel.php";
}

class programasController extends programasModel
{

    /*-----funcion agregar programa-----*/
    public function addProgramaController()
    {
        $nombrePrograma = $_POST['nombrePrograma'];
        $facultadPrograma = $_POST['facultadPrograma'];
        if ($nombrePrograma == "" || $facultadPrograma == "") {
            $alerta = [
                "Alerta" => "simple",
                "titulo" => "Ocurrio un error",
                "texto" => "por favor llenar todos los campos",
                "tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        $datos_programa = [
            "nombre" => $nombrePrograma,
            "facultad" => $facultadPrograma
        ];

        $agregar_programa = programasModel::addProgramaModel($datos_programa);
        if ($agregar_programa->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "titulo" => "Datos insertados",
                "texto" => "Se inserto la informacion correctamente ",
                "tipo" => "success",
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "titulo" => "Ocurrio un error",
                "texto" => "No se pudo insertar la informacion",
                "tipo" => "error",
            ];
        }
        echo json_encode($alerta);
    }

    public function getProgramaController()
    {
        $consulta = "SELECT * FROM programa";
        $datos = mainModel::conexionDB()->query($consulta);
        $datos = $datos->fetchAll();
        $table = "";
        $table .= '<div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>FACULTAD</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($datos as $row) {
            $table .= ' <tr class="text-center">
            <td>' . $row['id'] . '</td>
            <td>' . $row['nombre'] . '</td>
            <td>' . $row['facultad'] . '</td>
            <td>
				<form class="FormularioAjax" action="' . SERVERURL . 'Ajax/usuarioAjax.php" method="POST" data-form="delete">
					<input type="hidden" name="id_delete" value="' . mainModel::encryption($row['id']) . '">
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

    public function getProgramaController2()
    {
        $consulta = "SELECT * FROM programa";
        $datos = mainModel::conexionDB()->query($consulta);
        $datos = $datos->fetchAll();
        $combo = "";
        $combo .= '<select class="form-control" name="programa_id"> 
                    <option value="" selected="" disabled="">Seleccione una programa</option>';
        foreach ($datos as $row) {
            $combo .= ' <option value="' . $row['id'] . '">' . $row['nombre'] . '</option> ';
        }

        $combo .= ' </select>';
        return $combo;
    }
}