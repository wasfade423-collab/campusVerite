<?php
class AdminController
{
    public function __construct()
    {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function moderate()
    {
        $id = $_POST['id'] ?? '';
        $status = $_POST['status'] ?? '';

        if ($id && $status) {
            FeedbackModel::updateStatus($id, $status);
        }
        header('Location: index.php?action=admin-moderation');
    }
}
