<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require("../partials/head.php"); ?>
</head>
<body class="bg-main">

<?php

    require("../partials/header.php");
    require_once("../controller/index.php");
    
    $TOTAL_PROCESSES = [
        3=>[
            "tarea" => "¿Ordena el proceso de reparto?",
            "contenido" => "Confirmar orden",
            "tarea" => "¿Autoriza la propuesta de distribucion?"
        ],
        6 => [
            "ea" => "Historial de procesos",
            "a" => "lider ordena",
            "a" =>"El sistema genera la propuesta de distribucion para el armado de kits",
            "a" =>"lider autoriza"
        ]
    ];


?>


<div class="container mb-5 mt-5">
    <div class="row mb-4">
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-box-seam-fill"></i>    
                Almacen de productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Toda la información sobre los productos registrados en el almacén puede ser vista desde aquí o puede ser exportada en formato CSV para software de terceros (Excel)
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/almacen.php" role="button">
                    Ir a Almacen Productos
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-basket3-fill"></i>
                Distribucion de productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    El sistema dependiendo de las sugerencias del lider del area genera mediante un algoritmo propuestas de distribucion de los productos para el armado de kits alimenticios 
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/distribucion.php" role="button">
                    Ir a Distribucion Productos
                    <i class="bi bi-lock-fill"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-bar-chart-line-fill"></i>
                Analisis de los datos guardados
            </div>
            <div class="card-body">
                <p class="card-text">
                    El sistema genera un analisis completo de todos los datos guardados y elabora un informe en formato PDF para enviarlo mediante email al correo de gerencia
                </p>
            </div>
            <div class="card-footer text-center">
                <button disabled class="btn btn-dark w-100" href="/softkit/pages/analisis.php" role="button">
                    Ir a Analisis Datos
                    <i class="bi bi-lock-fill"></i>
                </button>
            </div>
        </div>
    </div>    
    </div>
    <div class="row">
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-clipboard2-plus-fill"></i>    
                Registro de nuevos productos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Cada ingreso de nuevos productos al almacén fisico debe ser registrado inmediatamente después con toda la información relevante en la base de datos del sistema
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/almacen.php?nuevo=registro" role="button">
                    Ir a Nuevo Registro
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-server"></i>
                Copias de la base de datos
            </div>
            <div class="card-body">
                <p class="card-text">
                    Una vez terminado y validado los registros de los productos ingresados, el sistema genera y almacena una copia de seguridad (backup) de la base de datos
                </p>
            </div>
            <div class="card-footer text-center">
                <button disabled class="btn btn-dark w-100" href="/softkit/pages/backup.php" role="button">
                    Ir a Registro Backup
                    <i class="bi bi-lock-fill"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm border-1 border-light rounded-3">
            <div class="card-header fs-6 bg-warning fw-bold">
                <i class="bi bi-person-fill"></i>
                Administrar trabajadores
            </div>
            <div class="card-body">
                <p class="card-text">
                    La Fundación Calma se encuentra en constante crecimiento por lo que administrar el registro de nuestros trabajadores del almacén ayudará en la distribución de tareas.
                </p>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark w-100" href="/softkit/pages/trabajadores.php"  role="button">
                    Ir a Trabajadores
                    <i class="bi bi-lock-fill"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</div>



</body>
</html>