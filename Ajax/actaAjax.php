<?php
$peticionAjax = true;
require_once "../Config/APP.php";
if (isset($_POST['asunto']) || isset($_POST['id_delete'])) {
    /*--------- Instancia al controlador ---------*/
    require_once "../Controller/actaController.php";
    $ins_acta = new actaController();
    /*--------- Agregar un usuario ---------*/
    if (isset($_POST['asunto'])) {
        echo $ins_acta->addActaController();
    }

    if (isset($_POST['id_delete'])) {
        echo $ins_acta->deleteActaController();
    }
} else {
    session_start(['name' => 'MVC']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login/");
    exit();
}
















/*$server = 'localhost';
$username = 'root';
$password = '';
$database = 'dbWeb';

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'dbWeb';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
$g = "45";
$sql = "INSERT INTO programa (nombre,facultad) VALUES (:d1, :d2)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':d1', $g);
$stmt->bindParam('d2', $g);
$stmt->execute();
return $stmt;*/