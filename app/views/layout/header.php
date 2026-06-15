<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusVérité - Feedback Anonyme</title>
    <link rel="icon" type="image/png" href="logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-900 min-h-screen flex flex-col">
    <nav class="bg-emerald-800 text-white shadow-md py-4 px-6">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="index.php?action=home" class="text-2xl font-bold flex items-center gap-2">
                <span>🟢 Campus Vérité</span>
            </a>
            <div class="flex gap-4 items-center">
                <a href="index.php?action=feedbacks" class="hover:underline">Fil d'avis</a>
                <a href="index.php?action=create-feedback" class="bg-emerald-600 px-4 py-2 rounded-lg font-semibold hover:bg-emerald-500 transition">Exprimer un Feedback</a>
                <?php if (isset($_SESSION['user_role'])): ?>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <a href="index.php?action=admin-dashboard" class="text-amber-300 hover:underline">Dashboard</a>
                    <?php endif; ?>
                    <a href="index.php?action=logout" class="text-red-300 hover:underline">Déconnexion</a>
                <?php else: ?>
                    <a href="index.php?action=login" class="hover:underline">Espace Admin/Suivi</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="flex-grow max-w-6xl w-full mx-auto p-4 md:p-6">