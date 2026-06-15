<?php require_once 'app/views/layout/header.php'; ?>

<div class="space-y-12">
    <!-- Hero Section -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-600 px-6 md:px-12 py-16 md:py-24 shadow-xl">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative z-10 max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">
                Exprimez votre vérité sans crainte
            </h1>
            <p class="text-lg md:text-xl text-emerald-50 mb-8 leading-relaxed font-medium">
                CampusVérité est votre espace académique 100% anonyme. Partagez vos coups de gueule, vos suggestions constructives et découvrez ce que pense vraiment la communauté universitaire.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="index.php?action=create-feedback" class="group inline-flex items-center justify-center gap-2 bg-white text-emerald-700 font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all text-center">
                    <span>✨ Publier un Avis Anonyme</span>
                </a>
                <a href="index.php?action=feedbacks" class="group inline-flex items-center justify-center gap-2 border-2 border-white text-white font-bold px-8 py-4 rounded-xl hover:bg-white/10 backdrop-blur transition-all text-center">
                    <span>👀 Consulter le Fil Public</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats & Features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-8 shadow-sm border border-emerald-100 hover:shadow-md transition">
            <div class="text-4xl mb-4">🔒</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">100% Anonyme</h3>
            <p class="text-gray-600 text-sm">Aucun traçage. Aucune collecte de données personnelles. Votre identité est protégée.</p>
        </div>
        
        <div class="bg-white rounded-xl p-8 shadow-sm border border-emerald-100 hover:shadow-md transition">
            <div class="text-4xl mb-4">💬</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Discussions Vivantes</h3>
            <p class="text-gray-600 text-sm">Réagissez aux avis, discutez des solutions, votez pour les meilleurs retours.</p>
        </div>
        
        <div class="bg-white rounded-xl p-8 shadow-sm border border-emerald-100 hover:shadow-md transition">
            <div class="text-4xl mb-4">🎯</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Catégorisé & Trié</h3>
            <p class="text-gray-600 text-sm">Filtrez par catégorie ou type pour trouver exactement ce qui vous intéresse.</p>
        </div>
    </div>

    <!-- CTA Secondary -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-12 text-center border border-indigo-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Comment ça marche ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            <div class="space-y-3">
                <div class="text-5xl font-black text-indigo-600">1</div>
                <h4 class="font-bold text-gray-900">Écrivez</h4>
                <p class="text-sm text-gray-600">Composez votre avis anonyme sans limite de temps</p>
            </div>
            <div class="space-y-3">
                <div class="text-5xl font-black text-indigo-600">2</div>
                <h4 class="font-bold text-gray-900">Partagez</h4>
                <p class="text-sm text-gray-600">Publiez instantanément sur la plateforme</p>
            </div>
            <div class="space-y-3">
                <div class="text-5xl font-black text-indigo-600">3</div>
                <h4 class="font-bold text-gray-900">Réagissez</h4>
                <p class="text-sm text-gray-600">Votez et discutez avec la communauté</p>
            </div>
        </div>
    </div>

    <!-- CTA Final -->
    <div class="text-center py-8">
        <p class="text-gray-600 mb-6">Prêt à être entendu ?</p>
        <a href="index.php?action=create-feedback" class="inline-block bg-emerald-700 text-white font-bold px-10 py-4 rounded-xl shadow-lg hover:shadow-xl hover:bg-emerald-600 transition-all text-lg">
            Publier votre premier Avis Anonyme
        </a>
    </div>
</div>

<?php require_once 'app/views/layout/footer.php'; ?>