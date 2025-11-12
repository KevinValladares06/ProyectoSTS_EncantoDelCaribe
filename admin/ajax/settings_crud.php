<?php
require('../inc/db_config.php');
require('../inc/esenciales.php');

/* ---------- Obtener datos ---------- */
if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM configuraciones WHERE sr_no = ?";
    $values = [1];
    $res = select($q, $values, "i");

    $data = mysqli_fetch_assoc($res);
    echo json_encode($data);
    exit; 
}

/* ---------- Actualizar datos ---------- */
if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE configuraciones SET site_title=?, site_about=? WHERE sr_no=?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];

    $res = update($q, $values, 'ssi');
    echo $res;
    exit;
}

/* ---------- Actualizar shutdown ---------- */
if (isset($_POST['upd_shutdown'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE configuraciones SET shutdown=? WHERE sr_no=?";
    $values = [$frm_data['shutdown'], 1];
    $res = update($q, $values, 'ii');
    echo $res;
}

?>
