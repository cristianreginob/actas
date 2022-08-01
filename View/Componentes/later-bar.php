<!-- Nav lateral -->
<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="<?php echo SERVERURL; ?>/View/assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
                <?php echo  $_SESSION['nombres_MVC'] . " " .  $_SESSION['apellidos_MVC'] ?> <br>
                <small class="roboto-condensed-light"><?php echo   $_SESSION['username_MVC'] ?></small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
            <ul>
                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Actas <i
                            class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?php echo SERVERURL; ?>actasNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar
                                Acta</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL; ?>actasList/"><i class="fas fa-clipboard-list fa-fw"></i>
                                &nbsp; Lista
                                de actas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Compromisos <i
                            class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?php echo SERVERURL; ?>compromisosList/"><i
                                    class="fas fa-clipboard-list fa-fw"></i>
                                &nbsp; Lista de
                                compromisos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Programas <i
                            class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?php echo SERVERURL; ?>programasNew/"><i class="fas fa-plus fa-fw"></i> &nbsp;
                                Agregar programa</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL; ?>programasList/"><i class="fas fa-clipboard-list fa-fw"></i>
                                &nbsp; Lista de
                                programa</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Usuarios <i
                            class="fas fa-chevron-down"></i></a>
                    <ul>
                        <li>
                            <a href="<?php echo SERVERURL; ?>userNew/"><i class="fas fa-plus fa-fw"></i> &nbsp;
                                Agregar usuario</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL; ?>userList/"><i class="fas fa-clipboard-list fa-fw"></i>
                                &nbsp; Lista de
                                usuarios</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</section>