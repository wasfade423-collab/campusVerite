<?php
/**
 * Vue des feedbacks - Fil d'actualité des retours
 */
?>

<div class="container">
    <h2>Fil d'actualité des retours</h2>
    
    <div class="feedbacks-list">
        <?php if (!empty($feedbacks)): ?>
            <?php foreach ($feedbacks as $feedback): ?>
                <div class="feedback-card">
                    <h3><?php echo htmlspecialchars($feedback['title']); ?></h3>
                    <p><?php echo htmlspecialchars($feedback['content']); ?></p>
                    <small>Posté le : <?php echo $feedback['created_at']; ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun feedback pour le moment.</p>
        <?php endif; ?>
    </div>
</div>
