<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
    </h3>
</div>
<div class="container-fluid">
    <?php
    require_once "./Controller/usuarioController.php";
    $ins_usuario = new usuarioController();
    echo  $ins_usuario->getusuariosController();
    ?>
</div>