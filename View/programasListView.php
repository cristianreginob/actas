<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PROGRAMAS
    </h3>
</div>


<!--CONTENT-->
<div class="container-fluid">
    <?php
    require_once "./Controller/programasController.php";
    $ins_programa = new programasController();
    echo  $ins_programa->getProgramaController();
    ?>
</div>