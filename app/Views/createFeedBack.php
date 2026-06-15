<?php
/**
 * Vue des feedbacks - Formulaire de création anonyme
 */
?>

<div class="container">
    <h2>Soumettre un retour anonyme</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <div class="form-group">
            <label for="content">Votre retour :</label>
            <textarea id="content" name="content" rows="5" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="category">Catégorie :</label>
            <select id="category" name="category" required>
                <option value="">-- Sélectionner une catégorie --</option>
                <option value="suggestion">Suggestion</option>
                <option value="probleme">Problème</option>
                <option value="feedback">Feedback</option>
            </select>
        </div>
        
        <button type="submit">Soumettre</button>
    </form>
</div>
