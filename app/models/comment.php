<?php
class CommentModel
{
    public static function getByFeedback($feedbackId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM comments WHERE feedback_id = ? ORDER BY created_at ASC");
        $stmt->execute([$feedbackId]);
        return $stmt->fetchAll();
    }

    public static function create($feedbackId, $content)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO comments (feedback_id, content) VALUES (?, ?)");
        return $stmt->execute([$feedbackId, $content]);
    }
}
