<?php
    if ($_SESSION['rol_name'] == 'Admin') {
 ?>
<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            <img src="../images/Logo_para_fondo_oscuro.png" alt="TESLA Education" class="logo_sidebar ">
            <!--
                TESLA Education <i class="zmdi zmdi-close btn-menu-dashboard visible-xs">

                </i>
            -->
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                <div class="full-box text-center icon-avatar">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <figcaption class="text-center text-titles" style="text-transform:capitalize;">
                    <?php
                        echo $_SESSION['username'];
                     ?>
                </figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <a href="#!">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-exit-system" >
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                <a href="home.php">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Home
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="cursos.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="eventos.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Eventos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="admin.php">
                    <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Users
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-card zmdi-hc-fw "></i> Pagos <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="registration.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registro</a>
                    </li>
                    <li>
                        <a href="payments.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Pago</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Inventario <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="inventario.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Inventario</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>
<?php
    }
    else if ($_SESSION['rol_name'] == 'Facilitador') {
 ?>
<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            <img src="../images/Logo_para_fondo_oscuro.png" alt="TESLA Education" class="logo_sidebar ">
            <!--
                TESLA Education <i class="zmdi zmdi-close btn-menu-dashboard visible-xs">

                </i>
            -->
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                <div class="full-box text-center icon-avatar">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <figcaption class="text-center text-titles" style="text-transform:capitalize;">
                    <?php
                        echo $_SESSION['username'];
                     ?>
                </figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <a href="#!">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-exit-system" >
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                <a href="home.php">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Home
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="cursos.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="eventos.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Eventos</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>
<?php
    }
    else if ($_SESSION['rol_name'] == 'Usuario') {
 ?>
<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            <img src="../images/Logo_para_fondo_oscuro.png" alt="TESLA Education" class="logo_sidebar ">
            <!--
                TESLA Education <i class="zmdi zmdi-close btn-menu-dashboard visible-xs">

                </i>
            -->
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                <div class="full-box text-center icon-avatar">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <figcaption class="text-center text-titles" style="text-transform:capitalize;">
                    <?php
                        echo $_SESSION['username'];
                     ?>
                </figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <a href="#!">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-exit-system" >
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                <a href="home.php">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Home
                </a>
            </li>
            <li>
                <a href="cursos.php">
                    <i class="zmdi zmdi-card zmdi-hc-fw "></i> Cursos
                </a>
            </li>
            <li>
                <a href="sesiones.php">
                    <i class="zmdi zmdi-card zmdi-hc-fw "></i> Sesiones
                </a>
            </li>
            <li>
                <a href="eventos.php">
                    <i class="zmdi zmdi-card zmdi-hc-fw "></i> Eventos
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Cuenta <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="inventario.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Editar</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>
<?php
} ?>
