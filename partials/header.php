<header class="sticky-top shadow-sm">
    <nav class="bg-white navbar px-4">
        <a class="navbar-brand link-dark fs-1 fw-bold" href="/softkit/pages">
            SoftKit
            <?php
            if(isset($_SESSION['login']) && $_SESSION['login']){
                    echo '<span class="d-block fs-6 link-dark fw-normal">';
                if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'gerente'){
                    echo "Supervisor del Sistema (Gerente)";
                }else if($_SESSION['rol'] == 'trabajador'){
                    echo "(Trabajador del Almacen)";
                }else if($_SESSION['rol'] == 'lider'){
                    echo "(Lider del Area de Almacen)";
                }
                echo '</span>';
            }else{
                echo '<span class="d-block fs-6 fw-normal link-dark">(Sistema de Fundacion Calma)</span>';
            }
            ?>
        </a>
        <?php if(isset($_SESSION['login']) && $_SESSION['login']){ ?>
        <span class="navbar-text text-center fs-5 fw-bold">
            <?php echo $_SESSION['nombre']; ?>
            <img class="rounded-circle mb-1 ms-2" width="40" src="https://avatars.dicebear.com/api/initials/<?php echo $_SESSION['nombre']; ?>.svg">
        </span>
        <?php } ?>
    </nav>
    <?php if(isset($_SESSION['login']) && $_SESSION['login']){ ?>
    <div class="w-100 bg-dark navbar px-4">
        <a class="link-light text-decoration-none" href="/softkit/pages/">
            <i class="bi bi-house-door"></i>
            Inicio
        </a>
        <a class="link-light text-decoration-none" href="/softkit/controller/index.php?logout=true">
            Cerrar Sesión
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
    <?php } ?>
</header>


<!-- <div class="progress" style="height: 25px;">
    <div class="progress-bar progress-bar-striped progress-bar-animated fs-6" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">200%</div>
</div> -->