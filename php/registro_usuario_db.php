<?php

    include 'conexion_db.php';

    $usuario = $_POST['usuario'];
    $id = $_POST['id'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena); 

    $query = "INSERT INTO usuarios(usuario, cedula, contrasena) 
            VALUES('$usuario', '$id', '$contrasena')";

    //Verificar Datos
    $verificar_id = mysqli_query($conexion, "SELECT * FROM usuarios WHERE cedula = '$id'");

    if(mysqli_num_rows($verificar_id) > 0){
        echo '
            <script>
                alert("Este ID ya está registrado!!!");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }
    
    //Guardar Datos en la BD
    $ejecutar = mysqli_query($conexion, $query); 

    if($ejecutar){
        echo '
            <script>
                alert("Usuario registrado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    } else{
        echo '
            <script>
                alert("ERROR, Intente de nuevo");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>