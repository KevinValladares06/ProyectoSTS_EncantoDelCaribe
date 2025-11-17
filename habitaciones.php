<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/principal.css">
</head>

<body class="bg-light">

    <!--Navbar-->
    <?php  require('inc/header.php'); ?>

    <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Nuestras Habitaciones</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-12  mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2">FILTROS</h4>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filtroDropdown" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filtroDropdown">
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Comprobar Disponibilidad</h5>
                            <label class="form-label">Fecha llegada</label>
                            <input type="date" class="form-control shadow-none; mb-3">
                            <label class="form-label">Fecha Salida</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Instalaciones</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none ne-1">
                                <label class="form-check-label" for="f1">Habitación Sencilla</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f2" class="form-check-input shadow-none ne-1">
                                <label class="form-check-label" for="f2">Habitación Deluxe</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none ne-1">
                                <label class="form-check-label" for="f3">Habitación Familiar</label>
                            </div>
                        </div>
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">Huéspedes</h5>
                            <div class="d-flex">
                                <div class="me-3">
                                    <label class="form-label">Adultos</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div>
                                    <label class="form-label">Niños</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-9 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/habitaciones/h1.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Habitación Sencilla</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Características</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 camas
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Baño
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcón
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Sala
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Servicios</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Tv por cable
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Aire acondicionado
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Desayuno
                            </span>
                        </div>
                        <div class="guests">
                            <h6 class="mb-1">Huéspedes</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Adultos
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Niños
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2  mt-lg-0 mt-md-0 mt-4 text-center">
                       <h6 class="mb-4">Lps 1000.00 por noche</h6>
                       <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mas detalles</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/habitaciones/h2.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Habitación Deluxe</h5>
                        <div class="features mb-3">
                             <h6 class="mb-1">Características</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 camas king size
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Baño
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Terraza
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Sala
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Servicios</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Minibar
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Aire acondicionado
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Desayuno
                            </span>
                        </div>
                        <div class="guests">
                            <h6 class="mb-1">Huéspedes</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Adultos
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Niños
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                       <h6 class="mb-4">Lps 2000.00 por noche</h6>
                       <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mas detalles</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/habitaciones/h3.jpg" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Habitación Familiar</h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Características</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 camas
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Baño
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcón
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Area de trabajo
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Servicios</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Area de juegos
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Aire acondicionado
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Desayuno y almuerzo
                            </span>
                        </div>
                        <div class="guests">
                            <h6 class="mb-1">Huéspedes</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                 6 Adultos
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                4 Niños
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                       <h6 class="mb-4">Lps 3200.00 por noche</h6>
                       <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Mas detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php require('inc/footer.php');?>

</body>
</html>