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
    die("Conexión fallida: " . mysqli_connect_error());
}

/* ---------- Función para limpiar datos ---------- */
function filteration($data) {
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

/* ---------- SELECT ---------- */
function select($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - SELECT");
        }
    } else {
        die("Query cannot be prepared - SELECT");
    }
}

/* ---------- UPDATE ---------- */
function update($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - UPDATE");
        }
    } else {
        die("Query cannot be prepared - UPDATE");
    }
}
?>
