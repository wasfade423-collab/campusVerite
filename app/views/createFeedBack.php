<?php require_once 'app/views/layout/header.php'; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Colonne gauche - Info -->
    <div class="lg:col-span-1 space-y-4">
        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-6 border border-emerald-200">
            <h3 class="font-bold text-lg text-emerald-900 mb-4 flex items-center gap-2">
                <span>🔒 Votre anonymat est garanti</span>
            </h3>
            <ul class="space-y-3 text-sm text-emerald-800">
                <li class="flex gap-2">
                    <span>✓</span> <span>Zéro collecte de données personnelles</span>
                </li>
                <li class="flex gap-2">
                    <span>✓</span> <span>Aucun email enregistré</span>
                </li>
                <li class="flex gap-2">
                    <span>✓</span> <span>Aucun cookie de tracking</span>
                </li>
                <li class="flex gap-2">
                    <span>✓</span> <span>Adresse IP non stockée</span>
                </li>
            </ul>
        </div>

        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
            <h3 class="font-bold text-lg text-blue-900 mb-4 flex items-center gap-2">
                <span>💡 Conseils pour un meilleur impact</span>
            </h3>
            <ul class="space-y-2 text-xs text-blue-800">
                <li>• Soyez précis et détaillé</li>
                <li>• Privilégiez les suggestions constructives</li>
                <li>• Restez respectueux dans le ton</li>
                <li>• Mentionnez des exemples concrets</li>
            </ul>
        </div>

        <div class="sticky top-24">
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-200">
                <p class="text-sm font-medium text-purple-900 mb-3">Catégories disponibles :</p>
                <div class="space-y-2 text-xs">
                    <div class="flex gap-2 items-start">
                        <span class="text-base">📚</span> <span class="text-purple-800">Pédagogie</span>
                    </div>
                    <div class="flex gap-2 items-start">
                        <span class="text-base">🏢</span> <span class="text-purple-800">Infrastructure</span>
                    </div>
                    <div class="flex gap-2 items-start">
                        <span class="text-base">📁</span> <span class="text-purple-800">Administration</span>
                    </div>
                    <div class="flex gap-2 items-start">
                        <span class="text-base">💻</span> <span class="text-purple-800">Équipements</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Colonne droite - Formulaire -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Header du formulaire -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-8 py-8">
                <h1 class="text-3xl font-black text-white mb-2">Exprimer votre avis</h1>
                <p class="text-emerald-50">Donnez votre feedback sans crainte. Vous êtes 100% protégé.</p>
            </div>

            <!-- Contenu du formulaire -->
            <div class="p-8 space-y-8">
                <form action="index.php?action=submit-feedback" method="POST" class="space-y-6">
                    <!-- Catégorie -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-gray-900">Sélectionnez la catégorie</label>
                        <select name="category" id="categorySelect" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none font-medium bg-white transition">
                            <option value="Pédagogie">📚 Pédagogie</option>
                            <option value="Infrastructure">🏢 Infrastructure</option>
                            <option value="Administration">📁 Administration</option>
                            <option value="Équipements">💻 Équipements</option>
                            <option value="Autre">✨ Autre...</option>
                        </select>
                        <p class="text-xs text-gray-500">Choisissez la catégorie qui correspond le mieux à votre avis</p>
                    </div>

                    <!-- Catégorie personnalisée -->
                    <div id="customCategoryWrapper" class="hidden space-y-3 animate-fade-in">
                        <label class="block text-sm font-bold text-gray-900">Précisez la nouvelle catégorie</label>
                        <input type="text" id="customCategoryInput" placeholder="Ex: Bibliothèque, Restau U, Transport, Parking..." class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none">
                        <p class="text-xs text-gray-500">Soyez précis pour que d'autres puissent vous retrouver</p>
                    </div>

                    <!-- Type d'expression -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-gray-900">Type d'expression</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="group cursor-pointer">
                                <input type="radio" name="type" value="Coup de Gueule" checked class="sr-only">
                                <div class="p-4 border-2 border-red-200 rounded-xl group-has-[:checked]:border-red-600 group-has-[:checked]:bg-red-50 hover:bg-red-50 transition font-bold text-center space-y-1">
                                    <div class="text-2xl">💥</div>
                                    <div class="text-sm text-gray-800">Coup de Gueule</div>
                                    <div class="text-xs text-gray-500 font-normal">Exprimer votre frustration</div>
                                </div>
                            </label>
                            <label class="group cursor-pointer">
                                <input type="radio" name="type" value="Suggestion" class="sr-only">
                                <div class="p-4 border-2 border-amber-200 rounded-xl group-has-[:checked]:border-amber-600 group-has-[:checked]:bg-amber-50 hover:bg-amber-50 transition font-bold text-center space-y-1">
                                    <div class="text-2xl">💡</div>
                                    <div class="text-sm text-gray-800">Suggestion</div>
                                    <div class="text-xs text-gray-500 font-normal">Proposer une amélioration</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-gray-900">Votre Message</label>
                        <textarea name="content" rows="8" required placeholder="Soyez précis et constructif. Plus vous donnez de détails, plus votre avis aura d'impact..." class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none resize-none font-medium text-gray-700"></textarea>
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Minimum 10 caractères recommandé</span>
                            <span id="charCount">0</span>
                        </div>
                    </div>

                    <!-- Bouton submit -->
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:from-emerald-700 hover:to-teal-700 transition-all text-lg flex items-center justify-center gap-2">
                        <span>🚀 Soumettre de façon 100% anonyme</span>
                    </button>

                    <!-- Disclaimer -->
                    <div class="bg-gray-50 rounded-lg p-4 text-center text-xs text-gray-600 border border-gray-200">
                        ⚠️ En envoyant ce formulaire, vous confirmez que votre message respecte nos conditions d'utilisation et ne contient pas de contenu offensant ou discriminatoire.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const customCategoryWrapper = document.getElementById('customCategoryWrapper');
        const customCategoryInput = document.getElementById('customCategoryInput');
        const textarea = document.querySelector('textarea[name="content"]');
        const charCount = document.getElementById('charCount');

        // Gestion de la catégorie personnalisée
        categorySelect.addEventListener('change', function() {
            if (this.value === 'Autre') {
                customCategoryWrapper.classList.remove('hidden');
                customCategoryInput.required = true;
                customCategoryInput.focus();
                categorySelect.removeAttribute('name');
                customCategoryInput.setAttribute('name', 'category');
            } else {
                customCategoryWrapper.classList.add('hidden');
                customCategoryInput.required = false;
                customCategoryInput.value = '';
                categorySelect.setAttribute('name', 'category');
                customCategoryInput.removeAttribute('name');
            }
        });

        // Compteur de caractères
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    });
</script>

<?php require_once 'app/views/layout/footer.php'; ?>