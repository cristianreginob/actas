<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php echo COMPANY; ?></title>
    <?php include "./View/Componentes/link-css.php"; ?>
</head>

<body>
    <?php
    $peticionAjax = false;
    require_once "./Controller/vistasController.php";
    $intance_view =  new vistasController();
    $vista = $intance_view->getVistasController();
    if ($vista == "login" || $vista == "404" || $vista == "userRegister") {
        require_once "./View/" . $vista . "View.php";
    } else {
        session_start(['name' => 'MVC']);
        require_once "./Controller/loginController.php";
        $ins_logincontroller = new loginController();

        if (!isset($_SESSION['token_MVC']) || !isset($_SESSION['id_MVC']) || !isset($_SESSION['username_MVC'])) {
            $ins_logincontroller->forzarCierreSession();
            exit();
        }
    ?>
    <!-- Main container -->
    <main class="full-box main-container">
        <?php include "./View/Componentes/later-bar.php"; ?>
        <!-- Page content -->
        <section class="full-box page-content">
            <?php
                include "./View/Componentes/nav-bar.php";
                include $vista;
                ?>
        </section>
    </main>
    <?php
        include "./View/Componentes/logOut.php";
    }
    ?>
    <?php include "./View/Componentes/script.php"; ?>
</body>

</html>