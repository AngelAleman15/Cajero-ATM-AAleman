// Variables globales
let selectedCard = null;
let walletOpen = true;

// Función para abrir/cerrar cartera
function toggleWallet() {
    const wallet = document.querySelector('.wallet-container-small');
    
    if (walletOpen) {
        wallet.classList.add('closed');
        walletOpen = false;
    } else {
        wallet.classList.remove('closed');
        walletOpen = true;
    }
}

// Función para seleccionar tarjeta física
function selectCard(cardElement, event) {
    // Evitar que el click de la tarjeta active el toggle de la cartera
    if (event) {
        event.stopPropagation();
    }
    
    // Solo funciona si la cartera está abierta
    if (!walletOpen) {
        return;
    }
    
    // Remover selección anterior
    document.querySelectorAll('.card-physical-small').forEach(card => {
        card.classList.remove('selected');
    });
    
    // Seleccionar nueva tarjeta
    cardElement.classList.add('selected');
    selectedCard = cardElement.dataset.card;
    
    // Actualizar indicador de estado
    const statusIndicator = document.querySelector('.status-indicator');
    const statusText = document.querySelector('.status-text');
    
    if (statusIndicator && statusText) {
        statusIndicator.classList.add('active');
        statusText.textContent = 'Tarjeta seleccionada';
        statusText.style.color = '#00aa00';
    }
    
    // Actualizar LED del cardreader si existe
    const ledText = document.querySelector('.cardreader-led-text');
    if (ledText) {
        ledText.textContent = 'Tarjeta Lista';
        ledText.style.color = '#00ff00';
    }
}

function insertCard() {
    const cardreader = document.querySelector('.cardreader-atm');
    const ledText = document.querySelector('.cardreader-led-text');
    
    // Agregar clase para animación
    cardreader.classList.add('inserting');
    
    // Cambiar el texto LED
    ledText.textContent = 'Leyendo...';
    
    // Después de 2 segundos, quitar la tarjeta y volver al estado original
    setTimeout(() => {
        cardreader.classList.remove('inserting');
        if (selectedCard) {
            ledText.textContent = 'Tarjeta Lista';
        } else {
            ledText.textContent = 'Insertar Tarjeta';
        }
    }, 2000);
}

// Función para ir al ATM con la tarjeta seleccionada
function goToATM() {
    if (selectedCard) {
        // Guardar la tarjeta seleccionada en sessionStorage
        sessionStorage.setItem('selectedCard', selectedCard);
        
        // Redirigir al ATM
        window.location.href = 'index.php';
    }
}

// Función para cancelar selección
function cancelSelection() {
    // Limpiar selección
    document.querySelectorAll('.card-physical-small').forEach(card => {
        card.classList.remove('selected');
    });
    selectedCard = null;
    
    // Actualizar indicadores
    const statusIndicator = document.querySelector('.status-indicator');
    const statusText = document.querySelector('.status-text');
    
    if (statusIndicator && statusText) {
        statusIndicator.classList.remove('active');
        statusText.textContent = 'Seleccione una tarjeta';
        statusText.style.color = '#333';
    }
}

// Verificar si hay una tarjeta seleccionada al cargar la página del ATM
document.addEventListener('DOMContentLoaded', function() {
    const storedCard = sessionStorage.getItem('selectedCard');
    if (storedCard && document.querySelector('.cardreader-atm')) {
        // Actualizar la interfaz del ATM para mostrar que hay una tarjeta seleccionada
        const ledText = document.querySelector('.cardreader-led-text');
        if (ledText) {
            ledText.textContent = 'Tarjeta Lista';
            ledText.style.color = '#00ff00';
        }
    }
});