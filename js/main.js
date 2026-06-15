/**
 * Scripts principaux pour Campus Vérité
 * Gestion des requêtes AJAX, interactions utilisateur, etc.
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Campus Vérité - Application initialisée');
    
    // Ajouter vos scripts ici
    
    // Exemple : Gestion des votes via AJAX
    const voteButtons = document.querySelectorAll('.vote-btn');
    voteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Vote enregistré');
            // Implémentation AJAX
        });
    });
});

// Fonction pour soumettre un feedback anonyme via AJAX
function submitFeedbackAnonymously(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    
    fetch('/api/feedbacks/create', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Votre feedback a été envoyé avec succès !');
            event.target.reset();
        } else {
            alert('Erreur : ' + data.message);
        }
    })
    .catch(error => console.error('Erreur :', error));
}
