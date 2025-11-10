<?php
$hname = "127.0.0.1";
$uname = "root";
$pass = "";
$dbname = "reservas";
$port = 3306;

// Create connection
$con = mysqli_connect($hname, $uname, $pass, $dbname, $port);

// Check connection
if (!$con) {
    die("Coneccion fallida: ". mysqli_connect_error());
}

function filteration($data){
    foreach($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if(mysqli_stmt_execute($stmt)){
            $res =mysqli_stmt_affected_rows($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Error en la ejecución: - Update");
        }
        
    }
    else{
        die("No se pudo preparar la consulta: - Update");
    }
}


?>