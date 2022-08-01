<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ACTA
    </h3>

</div>

<!-- Content here-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>Ajax/actaAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend>Información</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="asunto" class="bmd-label-floating">Asunto</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="asunto"
                                id="asunto" maxlength="50" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fecha" class="bmd-label-floating">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" />
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="descripcion" class="bmd-label-floating">Descripcion</label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="responsable" class="bmd-label-floating">Responsable</label>
                            <input type="text" class="form-control" name="responsable" id="responsable"
                                maxlength="20" />
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <?php
                            require_once "./Controller/programasController.php";
                            $ins_programa = new programasController();
                            echo  $ins_programa->getProgramaController2();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br /><br /><br />
        <p class="text-center" style="margin-top: 40px">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm">
                <i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR
            </button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm">
                <i class="far fa-save"></i> &nbsp; GUARDAR
            </button>
        </p>
    </form>
</div>