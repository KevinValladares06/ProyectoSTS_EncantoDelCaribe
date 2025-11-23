<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/principal.css">
</head>

<body class="bg-light">

    <!--Navbar-->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contáctanos</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` =?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe'] ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Dirección</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
                    </a>
                    <h5 class="mt-4">Llámanos</h5>
                    <a class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <a class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn2'] ?>
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: ask.encantodelcaribe@gmail.com" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email'] ?>
                    </a>
                    <h5 class="mt-4">Nuestras Redes Sociales</h5>
                    <a href="<?php echo $contact_r['fb'] ?>"
                        class="d-inline-block text-dark fs-5 me-2" target="_blank">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="<?php echo $contact_r['ig'] ?>"
                        class="d-inline-block text-dark fs-5 me-2" target="_blank">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                    <a href="<?php echo $contact_r['tt'] ?>"
                        class="d-inline-block text-dark fs-5" target="_blank">
                        <i class="bi bi-tiktok me-1"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Envíanos un Mensaje</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Nombre:</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email:</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Genero:</label>
                            <input name="subject" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Mensaje:</label>
                            <input name="message" required type="text" class="form-control shadow-none">
                        </div>
                        <button type="submit" name="enviar" class="btn text-white custom-bg mt-3">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['enviar'])) {
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

        $res = insert($q, $values, 'ssss');
        if ($res == 1) {
            alert('success', 'Mail Enviado');
        } else {
            alert('error', 'Error');
        }
    }
    ?>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>

</body>

</html>