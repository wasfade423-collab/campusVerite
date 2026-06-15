<?php
/**
 * Vue d'authentification - Formulaire d'inscription
 */
?>

<div class="container">
    <h2>Inscription</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit">S'inscrire</button>
    </form>
</div>
