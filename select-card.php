<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=2">
    <script src="js/script.js"></script>
    <title>Seleccionar Tarjeta - ATM</title>
</head>
<body>
    <div class="wallet-container">
        <h1 class="wallet-title">Seleccione su Tarjeta</h1>
        <div class="wallet">
            <div class="card-physical visa" data-card="1234567812345678" onclick="selectCard(this)">
                <div class="card-chip"></div>
                <div class="card-number">1234 5678 9012 5678</div>
                <div class="card-holder">JUAN PEREZ</div>
                <div class="card-brand">VISA</div>
                <div class="card-valid">12/25</div>
            </div>
            
            <div class="card-physical mastercard" data-card="8765432187654321" onclick="selectCard(this)">
                <div class="card-chip"></div>
                <div class="card-number">8765 4321 8765 4321</div>
                <div class="card-holder">MARIA LOPEZ</div>
                <div class="card-brand">MASTERCARD</div>
                <div class="card-valid">10/26</div>
            </div>
            
            <div class="card-physical amex" data-card="1111222233334444" onclick="selectCard(this)">
                <div class="card-chip"></div>
                <div class="card-number">1111 222233 34444</div>
                <div class="card-holder">CARLOS RUIZ</div>
                <div class="card-brand">AMERICAN EXPRESS</div>
                <div class="card-valid">08/27</div>
            </div>
        </div>
        
        <div class="action-buttons">
            <button id="confirmSelection" class="confirm-btn" onclick="goToATM()" disabled>
                Usar Tarjeta Seleccionada
            </button>
            <button class="cancel-btn" onclick="cancelSelection()">
                Cancelar
            </button>
        </div>
    </div>
</body>
</html>
