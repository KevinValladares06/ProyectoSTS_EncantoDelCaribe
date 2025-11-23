<?php
require('../inc/db_config.php');
require('../inc/esenciales.php');
adminLogin();

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

/* ---------- Eliminar registro ---------- */
if (isset($_POST['del_config'])) {
    $frm_data = filteration($_POST);

    $q = "DELETE FROM configuraciones WHERE sr_no=?";
    $values = [$frm_data['del_config']];
    $res = delete($q, $values, 'i');

    echo $res;
    exit;
}



if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM contact_details WHERE sr_no = ?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

/* ---------- Actualizar Contáctanos ---------- */
if (isset($_POST['upd_contacts'])) {
    $q = "UPDATE contact_details SET 
          address=?, gmap=?, pn1=?, pn2=?, email=?, fb=?, ig=?, tt=?, iframe=? 
          WHERE sr_no=?";

    $values = [
        $_POST['address'],
        $_POST['gmap'],
        $_POST['pn1'],
        $_POST['pn2'],
        $_POST['email'],
        $_POST['fb'],
        $_POST['ig'],
        $_POST['tt'],
        $_POST['iframe'],
        1
    ];

    $res = update($q, $values, 'sssssssssi');

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
    exit;
}
