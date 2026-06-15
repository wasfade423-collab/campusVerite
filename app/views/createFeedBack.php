<?php require_once 'app/views/layout/header.php'; ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Nouveau Feedback Anonyme</h2>
    <p class="text-sm text-red-500 font-semibold mb-6">⚠️ Aucun nom, adresse email ou identifiant n'est collecté ici.</p>

    <form action="index.php?action=submit-feedback" method="POST" class="space-y-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Sélectionnez la catégorie</label>
            <!-- Ajout d'un ID sur le select pour le cibler en JS -->
            <select name="category" id="categorySelect" required class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                <option value="Pédagogie">📚 Pédagogie</option>
                <option value="Infrastructure">🏢 Infrastructure</option>
                <option value="Administration">📁 Administration</option>
                <option value="Équipements">💻 Équipements</option>
                <option value="Autre">✨ Autre...</option>
            </select>
        </div>

        <!-- Conteneur masqué par défaut pour la nouvelle catégorie -->
        <div id="customCategoryWrapper" class="hidden animate-fade-in">
            <label class="block text-sm font-bold text-gray-700 mb-2">Précisez la nouvelle catégorie</label>
            <input type="text" id="customCategoryInput" placeholder="Ex: Bibliothèque, Restau U, Transport..." class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Type d'expression</label>
            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center justify-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-red-50 transition font-medium">
                    <input type="radio" name="type" value="Coup de Gueule" checked class="mr-2 text-red-600 focus:ring-red-500">
                    💥 Coup de Gueule
                </label>
                <label class="flex items-center justify-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-amber-50 transition font-medium">
                    <input type="radio" name="type" value="Suggestion" class="mr-2 text-amber-600 focus:ring-amber-500">
                    💡 Suggestion
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Votre Message</label>
            <textarea name="content" rows="6" required placeholder="Soyez précis et constructif dans vos propos pour faire bouger les choses..." class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
        </div>

        <button type="submit" class="w-full bg-emerald-800 text-white font-bold py-4 rounded-xl shadow-md hover:bg-emerald-700 transition">
            Soumettre de façon 100% anonyme
        </button>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const customCategoryWrapper = document.getElementById('customCategoryWrapper');
        const customCategoryInput = document.getElementById('customCategoryInput');

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
    });
</script>
<?php require_once 'app/views/layout/footer.php'; ?>