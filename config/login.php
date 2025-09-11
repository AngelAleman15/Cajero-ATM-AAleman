<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'database.php';
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $pin = isset($_POST['pin']) ? trim($_POST['pin']) : null;

        if ($id && $pin) {
            try {
                $stmt = $connection->prepare("SELECT * FROM usuarios WHERE id = ? AND contrasenia = ?");
                $stmt->bind_param("is", $id, $pin);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($result->num_rows === 1) {
                    $_SESSION['user_id'] = $id;
                    $_SESSION['logged_in'] = true;
                } else {
                    $_SESSION['error'] = "ID o contraseña incorrecto.";
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
            }
        }
        header('Location: ../index.php');

        exit();
    }
?>