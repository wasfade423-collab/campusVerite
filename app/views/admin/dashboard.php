<?php
require_once 'app/views/layout/header.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php?action=login');
    exit;
}

$db = Database::connect();
$totalFeedbacks = $db->query("SELECT COUNT(*) FROM feedbacks WHERE is_hidden = 0")->fetchColumn();
$totalReports = $db->query("SELECT COUNT(*) FROM feedbacks WHERE reports > 0 AND is_hidden = 0")->fetchColumn();
$topFeedbacks = $db->query("SELECT * FROM feedbacks WHERE is_hidden = 0 ORDER BY votes DESC LIMIT 3")->fetchAll();
?>

<div class="space-y-8">
    <div class="flex justify-between items-center">
        <h2 class="text-3xl font-extrabold text-gray-800">Espace Administration</h2>
        <a href="index.php?action=admin-moderation" class="bg-red-600 text-white font-semibold px-4 py-2 rounded-xl hover:bg-red-500">
            Modération des Abus (<?= $totalReports ?>)
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <span class="text-sm font-bold text-gray-400 uppercase">Avis Publics Actifs</span>
            <h3 class="text-4xl font-black text-emerald-700 mt-1"><?= $totalFeedbacks ?></h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <span class="text-sm font-bold text-gray-400 uppercase">Publications Signalées</span>
            <h3 class="text-4xl font-black text-red-600 mt-1"><?= $totalReports ?></h3>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h3 class="font-bold text-xl text-gray-800 mb-4">🔥 Top 3 des préoccupations majeures des étudiants</h3>
        <div class="space-y-4">
            <?php foreach ($topFeedbacks as $tf): ?>
                <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 flex justify-between items-start">
                    <div>
                        <span class="text-xs font-bold text-emerald-800 px-2 py-0.5 bg-emerald-100 rounded mb-1 inline-block"><?= $tf['category'] ?></span>
                        <p class="text-sm text-gray-700"><?= htmlspecialchars($tf['content']) ?></p>
                    </div>
                    <span class="font-bold text-emerald-600 text-sm whitespace-nowrap">👍 <?= $tf['votes'] ?> votes</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once 'app/views/layout/footer.php'; ?>