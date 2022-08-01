<?php
$peticionAjax = true;
require_once "../Config/APP.php";
if (isset($_POST['acta_id'])) {

    require_once "../Controller/compromisosController.php";
    $ins_compromisos = new compromisosController();

    if (isset($_POST['acta_id']) && isset($_POST['fechaInicial'])) {
        echo $ins_compromisos->addCompromisosController();
    }
} else {
    session_start(['name' => 'MVC']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login/");
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