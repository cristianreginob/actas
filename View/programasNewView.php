<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PROGRAMA
    </h3>

</div>

<!--CONTENT-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>Ajax/programasAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend>
                <i class="far fa-plus-square"></i> &nbsp; Información del programa
            </legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="nombrePrograma" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="nombrePrograma" id="nombrePrograma" maxlength="140" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="facultadPrograma" class="bmd-label-floating">Facultad</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control"
                                name="facultadPrograma" id="facultadPrograma" maxlength="140" />
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