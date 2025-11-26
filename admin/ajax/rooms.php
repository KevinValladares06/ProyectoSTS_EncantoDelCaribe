<?php
require('../inc/db_config.php');
require('../inc/esenciales.php');

if(isset($_POST['add_room']))
{
    $features = filteration(json_decode($_POST ['features']));
    $facilities = filteration(json_decode($_POST ['facilities']));

    $frm_data = filteration($_POST);
    $flag = 0;


    $ql = "INSERT INTO 'rooms'('name','area','price', 'quantily', 'adult', 'children', 'description') VALUES(?,?,?.?,?,?,?)";
    $value = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantily'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

    if(insert($ql, $values, 'siiiiis')){
        $flag = 1;
    }

    $room_id = mysqli_insert_id($con);

    $q2 = "INSERT INTO 'room_facilities'('room_id', 'facilities_id') VALUES(?,?)";

    if($stat = mysqli_prepare($con, $q2))
    {
        foreach($facilities as $f){
            mysqli_stat_bind_param($stat,'ii', $room_id, $f);
            mysqli_stat_execute($stat);
        }
        mysqli_stat_close($stat);
    }
    else{
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    $q3 = "INSERT INTO 'room_feautures'('room_id', 'features_id') VALUES(?,?)";

    if($stat = mysqli_prepare($con, $q3))
    {
        foreach($features as $f){
            mysqli_stat_bind_param($stat,'ii', $room_id, $f);
            mysqli_stat_execute($stat);
        }
        mysqli_stat_close($stat);
    }
    else{
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    if($flag){
        echo 1;
    } 
    else{
        echo 0;
    }
}

if(isset($_POST['get_all_rooms']))
{
    $res = selectAll('rooms');
    $i=1;

    $data = "";

    while($row = mysqli_fetch_assoc($res))
    {
        if ($row['status']==1){
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";
        }
        else{
            $status = "<button  onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>"; 
        }


        $data.="
        <tr class='align-middle'>
        <td>$i</td>
        <td>$row[name]</td>
        <td>$row[area] sq. ft.</td>
        <td>
        <span class='badge rounded-pill bg-light text-dark'>
        Adult: $row[adult]
        </span><br>
         <span class='badge rounded-pill bg-light text-dark'>
        Children: $row[children]
        </span>
        </td>
        <td>$row[price]</td>
        <td>$row[quantily]</td>
        <td>$status</td>
        <td>
        <button type='button'onclicl='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
            <i class='bi bi-pencil-square'></i>
        </button>
        </td>
        </tr>
        ";
        $i++;
    }
    echo $data;
}

if(isset($_POST['get_room']))
{
    $frm_data = filteration($_POST);
    $res1 = select("SELECT * FROM 'rooms' WHERE 'id'=?",[$frm_data['get_room']],'i');
    $res2 = select("SELECT * FROM 'room_features' WHERE 'room_id'=?",[$frm_data['get_room']],'i');
    $res3 = select("SELECT * FROM 'room_facilities' WHERE 'room_id'=?",[$frm_data['get_room']],'i');

    $roomdata = mysqli_fetch_assoc($res1);
    $features = [];
    $facilities = [];

    if(mysqli_num_rows($res2)>0){
        while($row = mysqli_fetch_assoc($res2)){
            array_push($features, $row['features_id']);
        }
    }

    if(mysqli_num_rows($res3)>0){
        while($row = mysqli_fetch_assoc($res3)){
            array_push($facilities, $row['facilities_id']);
        }
    }

    $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities];
    $data = json_endcode($data);
    echo $data;
}

if(isset($_POST['edit_room']))
{
    $features = filteration(json_decode($_POST ['features']));
    $facilities = filteration(json_decode($_POST ['facilities']));

    $frm_data = filteration($_POST);
    $flag = 0;

    $ql ="UPDATE 'rooms' SET 'name'= ?, 'area'= ?, 'price'= ?,'quantily'= ?,
    'adult'= ?, 'children'= ?, 'description'= ? WHERE 'id'= ?";
     $value = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantily'], $frm_data['adult'], $frm_data['children'], $frm_data['desc'], $frm_data['room_id']];

     if(update($ql, $values, 'siiiiisi')){
        $flag = 1;
    }

    $del_features = delete ("DELETE FROM 'room_features'  WHERE 'room_id = ?'", [$frm_data['room_id']], 'i');
    $del_facilities = delete ("DELETE FROM 'room_facilities'  WHERE 'room_id = ?'", [$frm_data['room_id']], 'i');

    if(!($del_facilities && $del_features)){
        $flag = 0;
    }

    $q2 = "INSERT INTO 'room_facilities'('room_id', 'facilities_id') VALUES(?,?)";

    if($stat = mysqli_prepare($con, $q2))
    {
        foreach($facilities as $f){
            mysqli_stat_bind_param($stmt,'ii', $frm_data ['room_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        $flag = 1;
        mysqli_stat_close($stmt);
    }
    else{
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    $q3 = "INSERT INTO 'room_feautures'('room_id', 'features_id') VALUES(?,?)";

    if($stat = mysqli_prepare($con, $q3))
    {
        foreach($features as $f){
            mysqli_stat_bind_param($stmt,'ii', $frm_data ['room_id'], $f);
            mysqli_stat_execute($stmt);
        }
        mysqli_stat_close($stmt);
    }
    else{
        $flag = 0;
        die('query cannot be prepared - insert');
    }

    if($flag){
        echo 1;
    } 
    else{
        echo 0;
    }
}


if(isset($_POST['toggle_status']))
{
   $frm_data = filteration($_POST);

   $q = "UPDATE 'rooms' SET 'status'= ? WHERE 'id'= ?";
   $v =[$frm_data['value'], $frm_data['toogle_status']];

   if(update($q, $v, 'ii')){
    echo 1;
   }
   else{
    echo 0;
   }
}

?>