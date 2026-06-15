<?php require_once 'app/views/layout/header.php'; ?>
<div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mt-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Création Compte Admin</h2>
    <form action="index.php?action=submit-register" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Adresse Email</label>
            <input type="email" name="email" required class="w-full p-3 border border-gray-300 rounded-xl">
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1">Mot de passe</label>
            <input type="password" name="password" required class="w-full p-3 border border-gray-300 rounded-xl">
        </div>
        <button type="submit" class="w-full bg-emerald-700 text-white font-bold py-3 rounded-xl hover:bg-emerald-600">
            Enregistrer le compte
        </button>
    </form>
</div>
<?php require_once 'app/views/layout/footer.php'; ?>