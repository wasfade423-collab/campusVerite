<?php
session_start();

require_once 'app/config/database.php';
require_once 'app/models/user.php';
require_once 'app/models/feedback.php';
require_once 'app/models/comment.php';

require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/FeedbackController.php';
require_once 'app/controllers/AdminController.php';

$action = $_GET['action'] ?? 'home';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'submit-register') (new AuthController())->register();
    if ($action === 'submit-login') (new AuthController())->login();
    if ($action === 'submit-feedback') (new FeedbackController())->store();
    if ($action === 'submit-fomment') (new FeedbackController())->storeComment();
    if ($action === 'vote') (new FeedbackController())->vote();
    if ($action === 'signal') (new FeedbackController())->signal();
    if ($action === 'moderate') (new AdminController())->moderate();
    exit;
}

switch ($action) {
    case 'home':
        require_once 'app/views/home.php';
        break;
    case 'feedbacks':
        require_once 'app/views/indexFeedBack.php';
        break;
    case 'create-feedback':
        require_once 'app/views/createFeedBack.php';
        break;
    case 'login':
        require_once 'app/views/auth/login.php';
        break;
    case 'register':
        require_once 'app/views/auth/register.php';
        break;
    case 'admin-dashboard':
        require_once 'app/views/admin/dashboard.php';
        break;
    case 'admin-moderation':
        require_once 'app/views/admin/moderation.php';
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    default:
        require_once 'app/views/home.php';
        break;
}
