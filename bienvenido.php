<?php

session_start();

include 'php/conexion_db.php';

if (!isset($_SESSION['usuario'])) {
    echo '
                <script>
                    alert("ERROR, Debes inisiar sesion!!!");
                    window.location = "index.php";
                </script>
            ';
    session_destroy();
    die();
}

$usuario = $_SESSION['usuario'];

$sql = "SELECT usuario, cedula FROM usuarios WHERE usuario = '$usuario' ";
$resultset = mysqli_query($conexion, $sql) or die("database error:" . mysqli_error($conexion));
$get_nombre = mysqli_fetch_array($resultset);
$usua = $get_nombre['usuario'];
$id = $get_nombre['cedula'];
//echo $id;
//echo json_encode($get_nombre);
//<script src="assets/js/encrip.js"></script>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="assets/css/estilos.css?">
</head>

<body class="body_bienvenido">
    <h1>Bienvenido XD</h1>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <div data="usuario"><h3><?php echo $usua?></h3></div>
                <button id="btn__encriptar">Encriptar el ID</button>
            </div>
        </div>
    </div>

    
    <script src="prueba.js"></script>
</body>

</html>