<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=1">
    <script src="js/script.js"></script>
    <title>Cajero ATM</title>
</head>
<body>
    <div class="main-container">
        <!-- Cartera de tarjetas -->
        <div class="wallet-section">
            <div class="wallet-container-small" onclick="toggleWallet()">
                <div class="wallet-flap"></div>
                <div class="card-counter">6</div>
                <div class="wallet-body">
                    <div class="wallet-interior">
                        <div class="card-slots">
                            <div class="card-physical-small visa" data-card="1234567812345678" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">1234 5678 9012 5678</div>
                                <div class="card-holder-small">JUAN PEREZ</div>
                                <div class="card-brand-small">VISA</div>
                                <div class="card-valid-small">12/25</div>
                            </div>
                            
                            <div class="card-physical-small mastercard" data-card="8765432187654321" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">8765 4321 8765 4321</div>
                                <div class="card-holder-small">MARIA LOPEZ</div>
                                <div class="card-brand-small">MASTERCARD</div>
                                <div class="card-valid-small">10/26</div>
                            </div>
                            
                            <div class="card-physical-small prex" data-card="1111222233334444" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">1111 222233 34444</div>
                                <div class="card-holder-small">CARLOS RUIZ</div>
                                <div class="card-brand-small">PREX</div>
                                <div class="card-valid-small">08/27</div>
                            </div>
                            
                            <div class="card-physical-small visa" data-card="5555666677778888" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">5555 6666 7777 8888</div>
                                <div class="card-holder-small">ANA MARTINEZ</div>
                                <div class="card-brand-small">VISA</div>
                                <div class="card-valid-small">03/28</div>
                            </div>
                            
                            <div class="card-physical-small mastercard" data-card="9999000011112222" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">9999 0000 1111 2222</div>
                                <div class="card-holder-small">LUIS GARCIA</div>
                                <div class="card-brand-small">MASTERCARD</div>
                                <div class="card-valid-small">07/29</div>
                            </div>
                            
                            <div class="card-physical-small prex" data-card="3333444455556666" onclick="selectCard(this, event)">
                                <div class="card-chip-small"></div>
                                <div class="card-number-small">3333 444455 56666</div>
                                <div class="card-holder-small">SOFIA TORRES</div>
                                <div class="card-brand-small">PREX</div>
                                <div class="card-valid-small">11/30</div>
                            </div>
                        </div>
                        <div class="wallet-label">MilaCartera</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cajero ATM (sin cambios) -->
        <div class="body-atm">
            <div class="displaycontainer-atm">
                <div class="displaybtn-atm" style="top: 35px; left: 20px;">
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                </div>
                <div class="screen-atm">
                    <?php include 'includes/pinmenu.php'; ?>
                </div>
                <div class="displaybtn-atm" style="top: 35px; right: 20px;">
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                    <div class="btn-atm"></div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; padding: 20px 20px 15px 20px; margin-top: 10px; margin-bottom: 20px;">
                <div class="cardreader-led-text">Insertar Tarjeta</div>
                <div class="cardreader-atm" onclick="insertCard()">
                    <div class="card"></div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; width: 100%; padding: 0 20px 20px 20px; position: relative; margin-top: 20px;">
                <div class="keypad-atm" style="margin-bottom: 15px;">
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button class="btn-yellow"></button>
                    <button>4</button>
                    <button>5</button>
                    <button>6</button>
                    <button class="btn-red"></button>
                    <button>7</button>
                    <button>8</button>
                    <button>9</button>
                    <button class="btn-green"></button>
                    <button></button>
                    <button>0</button>
                    <button></button>
                    <button class="btn-wide"></button>
                </div>
                <div class="paperscontainer-atm" style="position: absolute; right: 20px; top: 0;">
                    <div class="cashdispenser-atm"></div>
                    <div class="receiptprinter-atm"></div>
                </div>
            </div>
            
            <div style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); color: #888; font-size: 0.7em; font-weight: bold; letter-spacing: 1px;">
                Milanesa ATM
            </div>
        </div>
    </div>
</body>
</html>