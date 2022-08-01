<?php
require_once "./Model/vistasModel.php";
class vistasController extends vistasModel
{
    /*------controller para obtener la plantilla--------*/
    public function getPlantillaController()
    {
        return require_once "./View/plantilla.php";
    }

    /*------controller para obtener la plantilla--------*/
    public function getVistasController()
    {
        if (isset($_GET['views'])) {
            $ruta = explode("/", $_GET['views']);
            $respuesta = vistasModel::getVistasModel($ruta[0]);
        } else {
            $respuesta  = "login";
        }
        return $respuesta;
    }
}