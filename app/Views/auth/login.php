<?php
/**
 * Vue d'authentification - Formulaire de connexion
 */
?>

<div class="container">
    <h2>Connexion</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit">Se connecter</button>
    </form>
</div>
