
<div class="wallet-section">
    <div class="wallet-container-small">
        <div class="wallet-flap" onclick="toggleWallet()"></div>
        <div class="card-counter"></div>
        <div class="wallet-body">
            <div class="wallet-interior"> 
                <form action="config/login.php" method="POST" class="login-form-wallet">
                    <input type="number" name="id" placeholder="ID Usuario" required class="login-input"/>
                    <input type="password" name="pin" placeholder="Contraseña" required class="login-input"/>
                    <button type="submit" class="login-button">Abrir Cartera</button>
                </form>
                <div class="wallet-label">MilaCartera</div>
            </div>
        </div>
    </div>
</div>