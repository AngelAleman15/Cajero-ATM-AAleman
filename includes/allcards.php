<?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $user_id = $_SESSION['user_id'];
        require_once 'config/database.php';

        $stmt = $connection->prepare("SELECT id, numero_tarjeta, marca, saldo, fecha_vencimiento 
                                     FROM tarjetas 
                                     WHERE id_usuario = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $tarjeta_id = htmlspecialchars($row['id']);
                $numero_tarjeta = htmlspecialchars($row['numero_tarjeta']);
                $marca = htmlspecialchars($row['marca']);
                $saldo = number_format($row['saldo'], 2);
                $nombre_titular = htmlspecialchars($_SESSION['nombre_usuario']);
                
                $numero_formateado = substr($numero_tarjeta, 0, 4) . ' ' . 
                                   substr($numero_tarjeta, 4, 4) . ' ' . 
                                   substr($numero_tarjeta, 8, 4) . ' ' . 
                                   substr($numero_tarjeta, 12, 4);
                
                $clase_marca = strtolower(str_replace(' ', '', $marca));
                switch ($marca) {
                    case 'American Express':
                        $clase_marca = 'amex';
                        break;
                    case 'MasterCard':
                        $clase_marca = 'mastercard';
                        break;
                    case 'Visa':
                        $clase_marca = 'visa';
                        break;
                    default:
                        $clase_marca = 'default';
                }

                $fecha_vencimiento = date('m/y', strtotime($row['fecha_vencimiento']));
                
                echo '<div class="card-physical-small ' . $clase_marca . '" 
                           data-card="' . $numero_tarjeta . '" 
                           data-id="' . $tarjeta_id . '"
                           data-saldo="' . $saldo . '"
                           onclick="selectCard(this, event)">';
                echo '    <div class="card-chip-small"></div>';
                echo '    <div class="card-number-small">' . $numero_formateado . '</div>';
                echo '    <div class="card-holder-small">' . strtoupper($nombre_titular) . '</div>';
                echo '    <div class="card-brand-small">' . strtoupper($marca) . '</div>';
                echo '    <div class="card-valid-small">' . $fecha_vencimiento . '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="no-cards-message">';
            echo '    <p>No se encontraron tarjetas asociadas a este usuario.</p>';
            echo '    <p>Contacte al administrador para obtener una tarjeta.</p>';
            echo '</div>';
        }
        
        $stmt->close();
    } else {
        echo '<div class="error-message">';
        echo '    <p>Debe iniciar sesión para ver sus tarjetas.</p>';
        echo '</div>';
    }
?>