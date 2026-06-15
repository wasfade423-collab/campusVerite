<?php
class FeedbackController
{
    public function store()
    {
        $category = $_POST['category'] ?? '';
        $type = $_POST['type'] ?? '';
        $content = $_POST['content'] ?? '';

        if (!empty($category) && !empty($type) && !empty($content)) {
            FeedbackModel::create($category, $type, $content);
            header('Location: index.php?action=feedbacks&success=1');
        } else {
            header('Location: index.php?action=create-feedback&error=1');
        }
    }

    public function storeComment()
    {
        $feedbackId = $_POST['feedback_id'] ?? '';
        $content = $_POST['content'] ?? '';

        if (!empty($feedbackId) && !empty($content)) {
            CommentModel::create($feedbackId, $content);
        }
        header('Location: index.php?action=feedbacks');
    }

    public function vote()
    {
        $id = $_POST['id'] ?? '';
        if ($id) FeedbackModel::addVote($id);
        header('Location: index.php?action=feedbacks');
    }

    public function signal()
    {
        $id = $_POST['id'] ?? '';
        if ($id) FeedbackModel::reportAbuse($id);
        header('Location: index.php?action=feedbacks&signaled=1');
    }
}
