<?php
/**
 * Point d'entrée unique de l'application (Front Controller)
 * Toutes les requêtes passent par ce fichier
 */

// Charger les variables d'environnement
require_once '../.env';

// Définir le répertoire racine de l'application
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/Config');
define('MODELS_PATH', APP_PATH . '/Models');
define('CONTROLLERS_PATH', APP_PATH . '/Controllers');
define('VIEWS_PATH', APP_PATH . '/Views');

// Charger la configuration de la base de données
require_once CONFIG_PATH . '/Database.php';

// Charger les contrôleurs
require_once CONTROLLERS_PATH . '/controller.php';

// Charger les modèles
require_once MODELS_PATH . '/User.php';
require_once MODELS_PATH . '/Feedback.php';
require_once MODELS_PATH . '/Comment.php';

// Initialiser la base de données
$database = new Database();

// Récupérer l'URL et la router vers le bon contrôleur
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];

// Exemple simple de routage
if ($request_uri === '/' || $request_uri === '/index.php') {
    include VIEWS_PATH . '/layout/header.php';
    include VIEWS_PATH . '/home.php';
    include VIEWS_PATH . '/layout/footer.php';
} else if (strpos($request_uri, '/feedbacks') === 0) {
    include VIEWS_PATH . '/layout/header.php';
    include VIEWS_PATH . '/feedbacks/index.php';
    include VIEWS_PATH . '/layout/footer.php';
} else if (strpos($request_uri, '/auth/login') === 0) {
    include VIEWS_PATH . '/layout/header.php';
    include VIEWS_PATH . '/auth/login.php';
    include VIEWS_PATH . '/layout/footer.php';
} else if (strpos($request_uri, '/auth/register') === 0) {
    include VIEWS_PATH . '/layout/header.php';
    include VIEWS_PATH . '/auth/register.php';
    include VIEWS_PATH . '/layout/footer.php';
} else {
    http_response_code(404);
    echo "Page non trouvée";
}
