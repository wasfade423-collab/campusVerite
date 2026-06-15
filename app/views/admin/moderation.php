<?php
require_once 'app/views/layout/header.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php?action=login');
    exit;
}
$reported = FeedbackModel::getReported();
?>

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center gap-4">
        <a href="index.php?action=admin-dashboard" class="text-gray-500 hover:text-gray-800">&larr; Retour</a>
        <h2 class="text-3xl font-extrabold text-gray-800">Modération des Signalements</h2>
    </div>

    <?php if (empty($reported)): ?>
        <div class="bg-white p-12 rounded-xl text-center text-gray-500 border border-gray-100">
            Aucun abus n'est actuellement signalé sur le campus. Super !
        </div>
    <?php endif; ?>

    <div class="space-y-4">
        <?php foreach ($reported as $rep): ?>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-red-200 bg-red-50/10 flex flex-col justify-between md:flex-row gap-4">
                <div class="space-y-2">
                    <div class="flex gap-2 items-center">
                        <span class="bg-red-100 text-red-700 font-bold px-2.5 py-0.5 rounded text-xs">⚠️ <?= $rep['reports'] ?> Signalements</span>
                        <span class="text-xs text-gray-400"><?= $rep['category'] ?></span>
                    </div>
                    <p class="text-gray-700 text-sm"><?= htmlspecialchars($rep['content']) ?></p>
                </div>

                <div class="flex items-center gap-2 h-fit">
                    <form action="index.php?action=moderate" method="POST">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="hidden" name="status" value="approve">
                        <button type="submit" class="bg-emerald-600 text-white text-xs font-bold px-3 py-2 rounded hover:bg-emerald-500 transition">
                            Innocenter
                        </button>
                    </form>
                    <form action="index.php?action=moderate" method="POST">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="hidden" name="status" value="delete">
                        <button type="submit" class="bg-red-600 text-white text-xs font-bold px-3 py-2 rounded hover:bg-red-500 transition">
                            Masquer l'avis
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once 'app/views/layout/footer.php'; ?>