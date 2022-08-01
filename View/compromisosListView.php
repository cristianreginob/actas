<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE COMPROMISOS
    </h3>
</div>

<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>Ajax/compromisosAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend>&nbsp; Informacion del Acta</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php
                            require_once "./Controller/actaController.php";
                            $ins_acta = new actaController();
                            echo  $ins_acta->getActaController2();
                            ?>
                        </div>
                        <button type="submit" class="btn btn-raised btn-info btn-sm"><i
                                class="far fas fa-search fa-fw"></i>
                            &nbsp;
                            Buscar</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
    require_once "./Controller/usuarioController.php";
    $ins_usuario = new usuarioController();
    echo  $ins_usuario->getusuariosController();
    ?>
</div>