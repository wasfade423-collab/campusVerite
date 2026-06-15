<?php require_once 'app/views//layout/header.php'; ?>
<div class="text-center py-12 px-4 max-w-3xl mx-auto">
    <h1 class="text-5xl font-black text-emerald-900 mb-6 tracking-tight">Donnez votre voix sans crainte.</h1>
    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
        CampusVérité est votre espace académique 100% anonyme. Exprimez vos coups de gueule, partagez vos suggestions et votez pour les retours les plus utiles de la communauté universitaire.
    </p>
    <div class="flex flex-wrap justify-center gap-4">
        <a href="index.php?action=create-feedback" class="bg-emerald-700 text-white text-lg font-bold px-8 py-4 rounded-xl shadow-lg hover:bg-emerald-600 transition">
            Publier un Avis Anonyme
        </a>
        <a href="index.php?action=feedbacks" class="bg-white border border-gray-300 text-gray-700 text-lg font-bold px-8 py-4 rounded-xl hover:bg-gray-50 transition">
            Consulter le Fil Public
        </a>
    </div>
</div>
<?php require_once 'app/views/layout/footer.php'; ?>