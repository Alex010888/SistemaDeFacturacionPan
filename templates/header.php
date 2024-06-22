<?php
//URL base
$url_base="http://localhost/SistemaDeFacturacionPan/";

?>
<!doctype html>
<html lang="es">
    <head>
        
        <title>Sistema de panaderia</title>
        <style>
    footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1; /* Opcional: añade un color de fondo al footer */
        }
        </style>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
        crossorigin="anonymous">
        </script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
 
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php">Sistema <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Venta rapida</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base?>sessiones/pan/">Ingreso de productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base?>sessiones/usuario/">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar sesion</a>
                </li>
            </ul>
        </nav>
        <main class="container">