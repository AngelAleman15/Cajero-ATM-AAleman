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

        <?php 
        session_start(); 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: config/login.php');
            exit();
        }
        ?>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <?php include 'includes/wallet.php'; ?>
        <?php else: ?>
            <?php include 'includes/walletclosed.php'; ?>   
        <?php endif; ?>

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