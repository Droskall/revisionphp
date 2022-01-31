/**
 * Gestion de la disparition du message utilisateur de feedback.
 * @type {Element}
 */
const errorMessage = document.querySelector('.feedback-message');

if(errorMessage) {
    setTimeout(() => errorMessage.remove(), 5000);
}


/**
 * Validation du formulaire de contact.
 */
const form = document.querySelector('form#contact');
if(form) {
    const pass1 = document.getElementById('id-passwd');
    const pass2 = document.getElementById('id-passwd-repeat');

    pass2.addEventListener('keyup', function(event) {
        this.setCustomValidity('');
        if(this.value !== pass1.value) {
            this.setCustomValidity("Les password ne correspondent pas");
        }
    });
}

