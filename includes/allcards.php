<?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $id = $_SESSION['id'];
        require_once 'config/database.php';

        // Consulta para obtener las tarjetas del usuario
        $stmt = $connection->prepare("SELECT t.id, t.numero_tarjeta, t.marca, u.nombre 
                                     FROM usuarios u 
                                     INNER JOIN tarjetas t ON u.numero_tarjeta = t.numero_tarjeta 
                                     WHERE u.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Generar tarjetas dinámicamente
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Extraer y sanitizar datos de cada tarjeta
                $tarjeta_id = htmlspecialchars($row['id']);
                $numero_tarjeta = htmlspecialchars($row['numero_tarjeta']);
                $marca = htmlspecialchars($row['marca']);
                $nombre_titular = htmlspecialchars($row['nombre']);
                
                // Formatear número de tarjeta (XXXX XXXX XXXX XXXX)
                $numero_formateado = substr($numero_tarjeta, 0, 4) . ' ' . 
                                   substr($numero_tarjeta, 4, 4) . ' ' . 
                                   substr($numero_tarjeta, 8, 4) . ' ' . 
                                   substr($numero_tarjeta, 12, 4);
                
                // Determinar clase CSS según la marca de tarjeta
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
                
                // Generar fecha de vencimiento dinámica
                $fecha_vencimiento = date('m/y', strtotime('+3 years'));
                
                // Crear cada tarjeta HTML dinámicamente
                echo '<div class="card-physical-small ' . $clase_marca . '" 
                           data-card="' . $numero_tarjeta . '" 
                           data-id="' . $tarjeta_id . '"
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