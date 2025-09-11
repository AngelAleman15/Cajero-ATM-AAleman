<div class="wallet-section">
    <div class="wallet-container-small" onclick="toggleWallet()">
        <div class="wallet-flap"></div>
        <div class="card-counter">6</div>
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