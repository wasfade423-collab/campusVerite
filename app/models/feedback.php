<?php
class FeedbackModel
{
    public static function getAll($category = null, $type = null)
    {
        $db = Database::connect();
        $query = "SELECT * FROM feedbacks WHERE is_hidden = 0";
        $params = [];

        if ($category) {
            $query .= " AND category = ?";
            $params[] = $category;
        }
        if ($type) {
            $query .= " AND type = ?";
            $params[] = $type;
        }

        $query .= " ORDER BY created_at DESC";
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function create($category, $type, $content)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO feedbacks (category, type, content) VALUES (?, ?, ?)");
        return $stmt->execute([$category, $type, $content]);
    }

    public static function addVote($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE feedbacks SET votes = votes + 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function reportAbuse($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE feedbacks SET reports = reports + 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getReported()
    {
        $db = Database::connect();
        return $db->query("SELECT * FROM feedbacks WHERE reports > 0 ORDER BY reports DESC")->fetchAll();
    }

    public static function updateStatus($id, $action)
    {
        $db = Database::connect();
        if ($action === 'delete') {
            $stmt = $db->prepare("UPDATE feedbacks SET is_hidden = 1 WHERE id = ?");
        } else {
            $stmt = $db->prepare("UPDATE feedbacks SET reports = 0 WHERE id = ?");
        }
        return $stmt->execute([$id]);
    }
}
