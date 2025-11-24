<?php
require('../inc/db_config.php');
require('../inc/esenciales.php');

// Add Feature
if(isset($_POST['add_feature'])) {
    $frm_data = filteration($_POST);
    
    $q = "INSERT INTO `features` (`name`) VALUES (?)";
    $values = [$frm_data['name']];
    
    if(insert($q, $values, 's')) {
        echo 1;
    } else {
        echo 0;
    }
}

// Get Features
if(isset($_POST['get_features'])) {
    $res = selectAll('features');
    $i = 1;
    
    while($row = mysqli_fetch_assoc($res)) {
        echo <<<data
        <tr>
            <td>$i</td>
            <td>$row[name]</td>
            <td>
                <button type="button" onclick="rem_features($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </td>
        </tr>
        data;
        $i++;
    }
}

// Remove Feature
if(isset($_POST['rem_feature'])) {
    $frm_data = filteration($_POST);
    
    // Verificar si el feature está en uso
    $check_q = "SELECT * FROM `room_features` WHERE `features_id`=?";
    $check_values = [$frm_data['rem_feature']];
    $check_res = select($check_q, $check_values, 'i');
    
    if(mysqli_num_rows($check_res) > 0) {
        echo 'room_added';
    } else {
        $q = "DELETE FROM `features` WHERE `sr_no`=?";
        $values = [$frm_data['rem_feature']];
        
        if(delete($q, $values, 'i')) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

// Add Facility
if(isset($_POST['add_facility'])) {
    $frm_data = filteration($_POST);
    
    $img_r = uploadImage($_FILES['icon'], FACILITIES_FOLDER);
    
    if($img_r == 'inv_img') {
        echo 'inv_img';
    } else if($img_r == 'inv_size') {
        echo 'inv_size';
    } else if($img_r == 'upd_failed') {
        echo 'upd_failed';
    } else {
        $q = "INSERT INTO `facilities` (`name`, `icon`, `description`) VALUES (?, ?, ?)";
        $values = [$frm_data['name'], $img_r, $frm_data['desc']];
        
        if(insert($q, $values, 'sss')) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

// Get Facilities
if(isset($_POST['get_facilities'])) {
    $res = selectAll('facilities');
    $i = 1;
    
    $path = FACILITIES_IMG_PATH;
    
    while($row = mysqli_fetch_assoc($res)) {
        $icon = $path . $row['icon'];
        
        echo <<<data
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[name]</td>
            <td><img src="$icon" width="30px"></td>
            <td>$row[description]</td>
            <td>
                <button type="button" onclick="rem_facility($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </td>
        </tr>
        data;
        $i++;
    }
}

// Remove Facility
if(isset($_POST['rem_facility'])) {
    $frm_data = filteration($_POST);
    
    // Verificar si el facility está en uso
    $check_q = "SELECT * FROM `room_facilities` WHERE `facilities_id`=?";
    $check_values = [$frm_data['rem_facility']];
    $check_res = select($check_q, $check_values, 'i');
    
    if(mysqli_num_rows($check_res) > 0) {
        echo 'room_added';
    } else {
        // Primero obtener el nombre de la imagen para eliminarla
        $get_img_q = "SELECT * FROM `facilities` WHERE `sr_no`=?";
        $img_res = select($get_img_q, $check_values, 'i');
        $img_row = mysqli_fetch_assoc($img_res);
        
        // Eliminar la imagen
        if($img_row['icon'] != "" && file_exists(FACILITIES_FOLDER . $img_row['icon'])) {
            unlink(FACILITIES_FOLDER . $img_row['icon']);
        }
        
        // Eliminar el registro
        $q = "DELETE FROM `facilities` WHERE `sr_no`=?";
        $values = [$frm_data['rem_facility']];
        
        if(delete($q, $values, 'i')) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
?>