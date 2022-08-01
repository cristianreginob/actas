<?php
if ($peticionAjax) {
    require_once "../Model/actaModel.php";
} else {
    require_once "./Model/actaModel.php";
}

class actaController extends actaModel
{

    /*-----funcion agregar programa-----*/
    public function addActaController()
    {
        $asunto = $_POST['asunto'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];
        $responsable = $_POST['responsable'];
        $programa_id = $_POST['programa_id'];

        if ($asunto == "" || $descripcion == "") {
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
            "asunto" => $asunto,
            "fecha" => $fecha,
            "descripcion" => $descripcion,
            "responsable" => $responsable,
            "programa_id" => $programa_id,
        ];

        $agregar_programa = actaModel::addActaModel($datos_programa);
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

    public function getActaController()
    {
        $consulta = "SELECT * FROM acta";
        $datos = mainModel::conexionDB()->query($consulta);
        $datos = $datos->fetchAll();
        $table = "";
        $table .= '<div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>ASUNTO</th>
                    <th>FECHA</th>
                    <th>DESCRIPCION</th>
                    <th>RESPONSABLE</th>
                    <th>PROGRAMA</th>
                    <th>ELIMINAR</th>
                </tr>
                </tr>
            </thead>
            <tbody>';

        foreach ($datos as $row) {
            $table .= ' <tr class="text-center">
            <td>' . $row['id'] . '</td>
            <td>' . $row['asunto'] . '</td>
            <td>' . $row['fecha'] . '</td>
            <td>' . $row['descripcion'] . '</td>
            <td>' . $row['responsable'] . '</td>
            <td>' . $row['programa_id'] . '</td>
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


    public function getActaController2()
    {
        $consulta = "SELECT * FROM acta";
        $datos = mainModel::conexionDB()->query($consulta);
        $datos = $datos->fetchAll();
        $combo = "";
        $combo .= '<select class="form-control" name="acta_id"> 
                    <option value="" selected="" disabled="">Seleccione un acta</option>';
        foreach ($datos as $row) {
            $combo .= ' <option value="' . $row['id'] . '">' . $row['asunto'] . '</option> ';
        }

        $combo .= ' </select>';
        return $combo;
    }
}