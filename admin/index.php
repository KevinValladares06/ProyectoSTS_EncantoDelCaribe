<?php
require('inc/esenciales.php'); // Funciones esenciales
require('inc/db_config.php'); // Conexión a la base de datos

session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect('dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Login Admin</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php include 'hbsAdmin/index.hbs'; ?>

    <?php
    if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `admin_cred` WHERE `admin_nom` = ? AND `admin_pass` = ?";
    $values = [$frm_data['admin_nom'], $frm_data['admin_pass']];

    $res = select($query, $values, "ss");
    if ($res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['id'];
        redirect('dashboard.php');
        } else {
            alert('error', 'Nombre o clave incorrectos');
        }
    }
    ?>

    <?php require('inc/scripts.php'); ?>
</body>

</html>