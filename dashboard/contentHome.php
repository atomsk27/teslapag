<?php
    if ($_SESSION['rol_name'] == 'Admin') {
?>
<section class="full-box dashboard-contentPage">
    <!-- NavBar -->
    <nav class="full-box dashboard-Navbar">
        <ul class="full-box list-unstyled text-right">
            <li class="pull-left">
                <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
            </li>
            <li>
                <a href="#!" class="btn-Notifications-area">
                    <i class="zmdi zmdi-notifications-none"></i>
                    <span class="badge">7</span>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-search">
                    <i class="zmdi zmdi-search"></i>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-modal-help">
                    <i class="zmdi zmdi-help-outline"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Content page -->
    <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Página de Inicio <small>Administrador</small></h1>
        </div>
    </div>
    <div class="full-box text-center" style="padding: 30px 10px;">
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Administradores
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_admin->num_admin; ?>
                </p>
                <a href="admin.php"><small>Register</small></a>
            </div>
        </article>
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Facilitadores
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-male-alt"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_fac->num_fac; ?>
                </p>
                <a href="admin.php"><small>Register</small></a>
            </div>
        </article>

        <article class="full-box tile" href='#'>
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Usuarios
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-male-female"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_user->num_user; ?>
                </p>
                <a href="admin.php"><small>Register</small></a>
            </div>
        </article>
    </div>
</section>
<?php
    }
    else if ($_SESSION['rol_name'] == 'Facilitador') {
?>
<section class="full-box dashboard-contentPage">
    <!-- NavBar -->
    <nav class="full-box dashboard-Navbar">
        <ul class="full-box list-unstyled text-right">
            <li class="pull-left">
                <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
            </li>
            <li>
                <a href="#!" class="btn-Notifications-area">
                    <i class="zmdi zmdi-notifications-none"></i>
                    <span class="badge">7</span>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-search">
                    <i class="zmdi zmdi-search"></i>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-modal-help">
                    <i class="zmdi zmdi-help-outline"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Content page -->
    <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Página de Inicio <small>Facilitador</small></h1>
        </div>
    </div>
    <div class="full-box text-center" style="padding: 30px 10px;">
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Cursos
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_cursos->num_cursos; ?>
                </p>
                <a href="#"><small></small></a>
            </div>
        </article>
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Eventos
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-male-alt"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_evento->num_evento; ?>
                </p>
                <a href="#"><small></small></a>
            </div>
        </article>
    </div>
</section>
<?php
    }
    else if ($_SESSION['rol_name'] == 'Usuario') {
?>
<section class="full-box dashboard-contentPage">
    <!-- NavBar -->
    <nav class="full-box dashboard-Navbar">
        <ul class="full-box list-unstyled text-right">
            <li class="pull-left">
                <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
            </li>
            <li>
                <a href="#!" class="btn-Notifications-area">
                    <i class="zmdi zmdi-notifications-none"></i>
                    <span class="badge">7</span>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-search">
                    <i class="zmdi zmdi-search"></i>
                </a>
            </li>
            <li>
                <a href="#!" class="btn-modal-help">
                    <i class="zmdi zmdi-help-outline"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Content page -->
    <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Página de Inicio <small>Usuario</small></h1>
        </div>
    </div>
    <div class="full-box text-center" style="padding: 30px 10px;">
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Cursos
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_cursos->num_cursos; ?>
                </p>
                <a href="#"><small></small></a>
            </div>
        </article>
        <article class="full-box tile">
            <div class="full-box tile-title text-center text-titles text-uppercase">
                Eventos
            </div>
            <div class="full-box tile-icon text-center">
                <i class="zmdi zmdi-male-alt"></i>
            </div>
            <div class="full-box tile-number text-titles">
                <p class="full-box">
                    <?php echo $num_evento->num_evento; ?>
                </p>
                <a href="#"><small></small></a>
            </div>
        </article>
    </div>
</section>
<?php
    }
?>
