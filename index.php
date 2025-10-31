<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Encanto del Caribe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/principal.css">
</head>
<body class="bg-light">


    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Encanto del Caribe</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">Habitaciones</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                <a class="nav-link me-2" href="#">Contactanos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Sobre Nosotros</a>
                </li>
                
            </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Iniciar Sesión
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Registrarse
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class="bi bi-person-fill fs-3 me-2"></i>User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control shadow-none" >
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control shadow-none" >
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Login</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">¿Olvidó su contraseña?</a>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>    
                        Registro de Usuario
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Nota: Al registrarse, se aceptan nuestros Términos y Condiciones, así como la Política de Privacidad.
                            Tus datos deben coincidir con tu identificación.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Numero telefónico</label>
                                    <input type="number" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Imagen</label>
                                    <input type="file" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <textarea class="form-control shadow-none" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Codigo postal</label>
                                    <input type="number" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input type="password" class="form-control shadow-none" >
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control shadow-none" >
                                </div>
                            </div>
                        </div>

                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Registrarse</button>
                        </div>
                    </div>              
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/carousel/img1.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/img2.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/img3.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/img4.png" class="w-100 d-block">
            </div>
            </div>
        </div>
    </div>

    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Consulta la disponibilidad de reservas</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label label-date" >Fecha llegada</label>
                            <input type="date" class="form-control shadow-none" >
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label label-date" >Fecha salida</label>
                            <input type="date" class="form-control shadow-none" >
                        </div>
                        <div class="col-lg-3 mb-3">
                           <label class="form-label label-date" >Adulto</label>
                           <select class="form-select">
                                <option value="1">Uno</option>
                                <option value="2">Dos</option>
                                <option value="3">Tres</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                           <label class="form-label label-date" >Niños</label>
                           <select class="form-select">
                                <option value="1">Uno</option>
                                <option value="2">Dos</option>
                                <option value="3">Tres</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nuestras Habitaciones</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow card-style">
                    <img src="images/habitaciones/h1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación Sencilla</h5>
                        <h6 class="mb-4">Lps 1000.00 por noche</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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

                        <div class="rating mb-4">
                            <h6 class="mb-1">Calificación</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow card-style">
                    <img src="images/habitaciones/h2.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación Deluxe</h5>
                        <h6 class="mb-4">Lps 2000.00 por noche</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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

                        <div class="rating mb-4">
                            <h6 class="mb-1">Calificación</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow card-style">
                    <img src="images/habitaciones/h3.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación Familiar</h5>
                        <h6 class="mb-4">Lps 3200.00 por noche</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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

                        <div class="rating mb-4">
                            <h6 class="mb-1">Calificación</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reservar Ahora</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Mas habitaciones</a>

            </div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nuestros Sevicios</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/servicios/s1.png" width="80px">
                <h5 class="mt-3">WIFI</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/servicios/s2.png" width="80px">
                <h5 class="mt-3">Restaurante</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/servicios/s3.png" width="80px">
                <h5 class="mt-3">Terraza</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/servicios/s4.png" width="80px">
                <h5 class="mt-3">Terraza</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/servicios/s5.png" width="80px">
                <h5 class="mt-3">Estacionamiento</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Mas Servicios</a>
            </div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonios</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                    <img src="images/testimonio/u1.png" width="30px"> 
                    <h6 class="m-0 ms-2">Usuario Random</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing 
                        elit. Eum praesentium eveniet aliquid ratione 
                        dolore 
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                    <img src="images/testimonio/u1.png" width="30px"> 
                    <h6 class="m-0 ms-2">Usuario Random2</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing 
                        elit. Eum praesentium eveniet aliquid ratione 
                        dolore 
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                    <img src="images/testimonio/u1.png" width="30px"> 
                    <h6 class="m-0 ms-2">Usuario Random3</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing 
                        elit. Eum praesentium eveniet aliquid ratione 
                        dolore 
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contactanos</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.2687450435105!2d-87.23923378906365!3d14.061301386306733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6f97e03b9d6069%3A0x11d5cc5575958857!2sC.%20de%20Los%20Alcaldes%2C%20Tegucigalpa%2C%20Francisco%20Moraz%C3%A1n!5e0!3m2!1ses!2shn!4v1761876649826!5m2!1ses!2shn" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Llamanos</h5>
                    <a href="Telefono: 22557488" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone"></i>2255 7488</a>
                    <br>
                    <a href="Telefono: 22557488" class="d-inline-block text-decoration-none text-dark"> <i class="bi bi-telephone"></i>2256 7488</a>
                </div>

                <div class="bg-white p-4 rounded mb-4">
                    <h5>Siguenos</h5>
                    <a href="#" class="d-inline-block mb-3"> 
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-facebook me-1"></i>Facebook</span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3"> 
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-instagram me-1"></i>Instagram</span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block"> 
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-tiktok me-1"></i>Tik Tok</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- este es el footer -->
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">Hotel El Caribe</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                    Tempora, animi libero, beatae molestiae, deleniti fugit 
                    similique modi dolor laudantium ipsa repudiandae temporibus.
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Inicio</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Habitaciones</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Servicios</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contactos</a> <br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Sobre Nosotros</a> <br>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Siguenos</h5>
                <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-facebook me-1"></i>Facebook
                </a>
                <br>
                <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-instagram me-1"></i>Instagram
                </a>
                <br>
                <a href="#" class="d-inline-block text-dark text-decoration-none ">
                    <i class="bi bi-tiktok me-1"></i>Tik Tok
                </a>
                <br>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Diseñado por Equipo #6/Prototipo Pantalla princiapl</h6>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="htpps://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", 
        {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
        });
    </script>
    <script>
    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: 3,
      loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints:{
        320:{
            slidesPerView:1,
        },
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1024:{
            slidesPerView:3,
        },
      }
    });
  </script>

</body>
</html>