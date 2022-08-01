<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ACTAS
    </h3>

</div>

<!-- Content here-->
<div class="container-fluid">
    <?php
    require_once "./Controller/actaController.php";
    $ins_programa = new actaController();
    echo  $ins_programa->getActaController();
    ?>
</div>