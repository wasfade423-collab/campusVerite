<?php require_once 'app/views/layout/header.php'; ?>

<div class="min-h-[calc(100vh-200px)] flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <!-- Card Principal -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-8 py-12 text-center">
                <div class="inline-block bg-white text-gray-900 rounded-full px-6 py-3 font-bold mb-4 text-sm">
                    🔐 Accès Modérateurs
                </div>
                <h1 class="text-3xl font-black text-white mb-2">Connexion Admin</h1>
                <p class="text-gray-300 text-sm">Espace réservé aux modérateurs de la plateforme</p>
            </div>

            <!-- Formulaire -->
            <div class="px-8 py-10">
                <form action="index.php?action=submit-login" method="POST" class="space-y-6">
                    <!-- Email -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-gray-900">Adresse Email</label>
                        <div class="relative">
                            <div class="absolute left-4 top-3.5 text-gray-400">✉️</div>
                            <input 
                                type="email" 
                                name="email" 
                                required 
                                placeholder="votre.email@admin.fr"
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl outline-none focus:border-gray-900 focus:ring-2 focus:ring-gray-100 transition font-medium"
                            >
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-bold text-gray-900">Mot de passe</label>
                            <a href="#" class="text-xs text-gray-600 hover:text-gray-900 transition">Oublié ?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute left-4 top-3.5 text-gray-400">🔒</div>
                            <input 
                                type="password" 
                                name="password" 
                                required 
                                placeholder="••••••••"
                                class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl outline-none focus:border-gray-900 focus:ring-2 focus:ring-gray-100 transition font-medium"
                            >
                        </div>
                    </div>

                    <!-- Remember me -->
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-gray-900">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition">Rester connecté</span>
                    </label>

                    <!-- Bouton -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-gray-900 to-gray-800 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:from-black hover:to-gray-900 transition-all text-lg flex items-center justify-center gap-2"
                    >
                        <span>🚀 Se connecter</span>
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs">
                            <span class="px-2 bg-white text-gray-500">ou</span>
                        </div>
                    </div>

                    <!-- Alternative -->
                    <div class="bg-blue-50 rounded-lg p-4 text-center text-sm text-blue-800 border border-blue-200">
                        <p class="font-medium mb-2">Besoin d'un accès modérateur ?</p>
                        <p class="text-xs text-blue-700">Contactez l'administrateur principal de CampusVérité</p>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500">
                    ⚠️ Réservé uniquement aux modérateurs autorisés.
                    <br>
                    <a href="index.php?action=home" class="text-gray-700 font-semibold hover:underline">← Retour à l'accueil</a>
                </p>
            </div>
        </div>

        <!-- Informations supplémentaires -->
        <div class="mt-8 bg-white/50 backdrop-blur rounded-xl p-6 border border-gray-100 text-center text-sm text-gray-600">
            <p class="mb-3">💡 Rôle des modérateurs :</p>
            <ul class="space-y-1 text-xs text-gray-500">
                <li>✓ Examiner et valider les avis publiés</li>
                <li>✓ Signaler les contenus inappropriés</li>
                <li>✓ Gérer la qualité de la plateforme</li>
            </ul>
        </div>
    </div>
</div>

<?php require_once 'app/views/layout/footer.php'; ?>