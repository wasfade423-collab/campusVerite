<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusVérité - Feedback Anonyme</title>
    <link rel="icon" type="image/png" href="logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --primary-light: #10b981;
        }

        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #f0f9ff 100%);
        }

        /* Animations personnalisées */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.7);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(5, 150, 105, 0);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        /* Smooth transitions */
        * {
            transition: all 0.2s ease;
        }

        /* Hover effects */
        .nav-link {
            position: relative;
            padding-bottom: 0.5rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #10b981;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="font-sans text-gray-900 min-h-screen flex flex-col">
    <!-- Navigation supérieure -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-emerald-100/50 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo/Marque -->
                <a href="index.php?action=home" class="flex items-center gap-3 group">
                    <div class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">
                        CV
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">CampusVérité</p>
                        <p class="text-xs text-gray-500">Feedback Anonyme</p>
                    </div>
                </a>

                <!-- Navigation principale -->
                <div class="hidden md:flex gap-8 items-center">
                    <a href="index.php?action=home" class="nav-link text-sm font-medium text-gray-700 hover:text-emerald-600">Accueil</a>
                    <a href="index.php?action=feedbacks" class="nav-link text-sm font-medium text-gray-700 hover:text-emerald-600">Fil d'avis</a>
                    <a href="index.php?action=create-feedback" class="nav-link text-sm font-medium text-gray-700 hover:text-emerald-600">Donner son avis</a>
                </div>

                <!-- Actions utilisateur -->
                <div class="flex gap-3 items-center">
                    <?php if (isset($_SESSION['user_role'])): ?>
                        <?php if ($_SESSION['user_role'] === 'admin'): ?>
                            <a href="index.php?action=admin-dashboard" class="hidden sm:inline-block text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-2 rounded-lg hover:bg-amber-100">
                                ⚙️ Dashboard
                            </a>
                        <?php endif; ?>
                        <a href="index.php?action=logout" class="text-xs font-semibold text-red-600 bg-red-50 px-4 py-2 rounded-lg hover:bg-red-100">
                            Déconnexion
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=create-feedback" class="hidden sm:inline-block bg-emerald-600 text-white text-sm font-bold px-6 py-2 rounded-lg hover:bg-emerald-700 shadow-md hover:shadow-lg">
                            + Publier
                        </a>
                        <a href="index.php?action=login" class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-4 py-2 rounded-lg hover:bg-emerald-100">
                            Admin
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="flex-grow max-w-7xl w-full mx-auto p-4 md:p-8 animate-fade-in">