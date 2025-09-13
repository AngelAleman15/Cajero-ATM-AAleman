<?php
    session_start();
    $id = $_POST['id']; 
    $pin = $_POST['pin']; 

    if(isset($id) && isset($pin)) {
        require_once 'database.php';

        $stmt = $connection->prepare("SELECT * FROM usuarios WHERE id = ? AND contrasenia = ?");
        $stmt->bind_param("ss", $id, $pin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
            header("location:../index.php");
        } else {
            header("location:../index.php");
        }
    } else {
        echo "no existe";
    }
?>