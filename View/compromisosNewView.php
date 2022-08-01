<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO COMPROMISO
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
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información del compromiso</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="descripcion" class="bmd-label-floating">Descripcion</label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fechaInicial" class="bmd-label-floating">Fecha inicial</label>
                            <input type="date" class="form-control" name="fechaInicial" id="fechaInicial" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fechaFinal" class="bmd-label-floating">Fecha final</label>
                            <input type="date" class="form-control" name="fechaFinal" id="fechaFinal" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="responsable" class="bmd-label-floating">Responsable</label>
                            <input type="text" class="form-control" name="responsable" id="responsable">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>

        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>