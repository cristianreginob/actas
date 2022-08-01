<?php
$peticionAjax = true;
require_once "../Config/APP.php";
if (isset($_POST['nombrePrograma'])) {

    require_once "../Controller/programasController.php";
    $ins_programas = new programasController();

    if (isset($_POST['nombrePrograma']) && isset($_POST['facultadPrograma'])) {
        echo $ins_programas->addProgramaController();
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