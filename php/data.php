<?php

include 'conexion_db.php';


$usuario = $_SESSION['usuario'];

$sql = "SELECT usuario, cedula FROM usuarios WHERE usuario = '$usuario' ";
$resultset = mysqli_query($conexion, $sql) or die("database error:" . mysqli_error($conexion));

$get_nombre = mysqli_fetch_array($resultset);

$id = $get_nombre['cedula'];

echo json_encode($get_nombre);

    /*try {

        $conexion = new PDO("mysql:host=localhost;port=3306;dbname=login_encriptado_db", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
        $res = $conexion->query('SELECT * FROM usuarios') or die(print($conexion->errorInfo()));
    
        $data = [];
    
        while($item = $res->fetch(PDO::FETCH_OBJ)) {
    
            $data[] = [
                'cedula' => $item->cedula,
                'contrasena' => $item->contrasena,
                'usuario' => $item->usuario,
            ];
    
        }
    
        echo json_encode($data);
    
    } catch(PDOException $error) {
    
        echo $error->getMessage();
        die();
    
    }*/
