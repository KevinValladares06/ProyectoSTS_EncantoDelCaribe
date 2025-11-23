<?php
require('../inc/db_config.php');
require('../inc/esenciales.php');
adminLogin();

// Alta de imagen (con nombre)
if (isset($_POST['add_image'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadImage($_FILES['picture'], CAROUSEL_FOLDER);

    if (in_array($img_r, ['inv_img', 'inv_size', 'upd_failed'])) {
        echo $img_r;
        exit;
    }

    $q = "INSERT INTO `carousel`(`image`) VALUES (?)";
    $values = [$img_r];
    $res = insert($q, $values, 's');
    echo $res;
}


// Visualización de miembros
if (isset($_POST['get_carousel'])) {
    $res = selectAll('carousel');

    while ($row = mysqli_fetch_assoc($res)) {
        $path = CAROUSEL_IMG_PATH;
        echo <<<data
        <div class="col-md-2 mb-3">
            <div class="card bg-dark text-white">
                <img src="$path{$row['picture']}" class="card-img">
                <div class="card-img-overlay text-end">
                    <button type="button" onclick="rem_image({$row['sr_no']})" class="btn btn-danger btn-sm shadow">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
        data;
    }
}

if (isset($_POST['rem_image'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_image']];

    $pre_q = "SELECT * FROM `carousel` WHERE `sr_no`=?";
    $res = select($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['picture'], CAROUSEL_FOLDER)) {
        $q = "DELETE FROM `carousel` WHERE `sr_no`=?";
        $del_res = delete($q, $values, 'i');
        echo $res;
    } else {
        echo 0;
    }
}
