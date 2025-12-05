<?php
require('inc/esenciales.php');
require('inc/db_config.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Admin - Usuarios</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php include('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Usuarios</h3>

                <!-- Features Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                           <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Buscar usuario">
                        </div>
                        
                        <!-- Features Table -->
                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">NO. Telefono</th>
                                        <th scope="col">Locación</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Verificado</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                    <!-- Los datos se cargarán con JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 




      <?php require('inc/scripts.php'); ?>

      <script src="scripts/users.js"></script>
</body>
</html>