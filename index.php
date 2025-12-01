<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Encanto del Caribe</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/principal.css">
</head>

<body class="bg-light">

    <!--Navbar-->
    <?php require('inc/header.php'); ?>

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

                <?php
                /* $res = selectAll('carousel');
                    while ($row = mysqli_fetch_assoc($res)) {
                        $path = CAROUSEL_IMG_PATH;
                        echo <<< data
                    $path$row[image]
                    data;
                    }*/
                ?>
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
                            <label class="form-label label-date">Fecha llegada</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label label-date">Fecha salida</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label label-date">Adulto</label>
                            <select class="form-select">
                                <option value="1">Uno</option>
                                <option value="2">Dos</option>
                                <option value="3">Tres</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label label-date">Niños</label>
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
            <?php
                $room_res = select("SELECT * FROM `rooms` WHERE `status` = ? AND `removed` = ? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');

                while ($room_data = mysqli_fetch_assoc($room_res)) {

                    //obtener las caracteristicas de la habitacion
                    $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f 
                    INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                    WHERE rfea.room_id = '$room_data[id]'");

                    $features_data = "";
                    while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                        $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                $fea_row[name]
                            </span>";
                    }

                    //obtener las comodidades de la habitacion

                    $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                    INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                    WHERE rfac.room_id = '$room_data[id]'");

                    $facilities_data = "";
                    while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                        $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                $fac_row[name]
                            </span>";
                    }

                    //obtener la imagen vista previa de la habitacion
                    $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                    $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
                WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

                    if (mysqli_num_rows($thumb_q) > 0) {
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                    }

                    //print carta de la habitacion
                    echo <<<data
                       <div class="col-lg-4 col-md-6 my-3">
                                        <div class="card border-0 shadow card-style">
                                            <img src="images/habitaciones/h1.jpg" class="card-img-top">
                                            <div class="card-body">
                                                <h5>$room_data[name]</h5>
                                                <h6 class="mb-4">Lps $room_data[price] por noche</h6>
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
                                                    <a href="hab_detalles.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                                                </div>

                                            </div>
                                        </div>
                        </div>
                        

                    data;
                }
                ?>
            

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
                <a href="habitaciones.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Mas habitaciones</a>

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
                        <h6 class="m-0 ms-2">Usuario Random1</h6>
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

    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` =?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));

    ?>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contáctanos</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Llámanos</h5>
                    <a href="Telefono: 22557488" class="d-inline-block mb-2 text-decoration-none text-dark"> <i class="bi bi-telephone"></i> <?php echo $contact_r['pn1'] ?></a>
                    <br>
                    <a href="Telefono: 22557488" class="d-inline-block text-decoration-none text-dark"> <i class="bi bi-telephone"></i> <?php echo $contact_r['pn2'] ?></a>
                </div>
                <?php
                if ($contact_r['pn2'] != '') {
                }
                ?>

                <div class="bg-white p-4 rounded mb-4">
                    <h5>Síguenos</h5>
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-facebook me-1"></i> Facebook </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block text-dark text-decoration-none mb-2" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-instagram me-1"></i> Instagram </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['tt'] ?>" class="d-inline-block text-dark text-decoration-none" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2"> <i class="bi bi-tiktok me-1"></i> Tiktok </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>