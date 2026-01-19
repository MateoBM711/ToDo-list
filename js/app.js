document.addEventListener('DOMContentLoaded', function() {
    // Agregar event listeners a todos los botones de check
    const checkButtons = document.querySelectorAll('.check-btn');
    
    checkButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('checked');
        });
    });
});