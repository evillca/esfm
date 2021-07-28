<?php
    include '../conexion.php';
    session_start();
    $numeroDocumento = trim($_POST['numeroDoc']);

    $sql = "SELECT * FROM ciudadanonacional 
            WHERE nrodocumento = '$numeroDocumento'";
    $respuesta = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($respuesta) > 0) {
        $data = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo $data = 0;
    }

