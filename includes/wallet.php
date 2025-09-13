<div class="wallet-section">
    <div class="wallet-container-small">
        <div class="wallet-flap" onclick="toggleWallet()"></div>
        <div class="card-counter">
            <?php 
            if (isset($_SESSION['user_id'])) {
                require_once 'config/database.php';
                $stmt = $connection->prepare("SELECT COUNT(*) as total FROM tarjetas WHERE id_usuario = ?");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $count = $result->fetch_assoc()['total'];
                echo $count;
                $stmt->close();
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="wallet-body">
            <div class="wallet-interior"> 
                <div class="card-slots">
                    <?php include 'includes/allcards.php'; ?>
                </div>
                <a href="config/logout.php" class="logout-button">Cerrar Sesión</a>
                <div class="wallet-label">MilaCartera</div>
            </div>
        </div>
    </div>
</div>