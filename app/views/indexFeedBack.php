<?php
require_once 'app/views/layout/header.php';
$catFilter = $_GET['category'] ?? null;
$typeFilter = $_GET['type'] ?? null;
$feedbacks = FeedbackModel::getAll($catFilter, $typeFilter);
?>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-fit space-y-4">
        <h3 class="font-bold text-lg text-gray-800 mb-2">Filtres de recherche</h3>
        <div>
            <span class="text-xs font-bold uppercase text-gray-400 block mb-1">Catégories</span>
            <div class="flex flex-col gap-1">
                <a href="index.php?action=feedbacks" class="px-3 py-2 rounded-lg text-sm <?= !$catFilter ? 'bg-emerald-100 text-emerald-800 font-bold' : 'hover:bg-gray-100' ?>">Tous les avis</a>
                <?php foreach (['Pédagogie', 'Infrastructure', 'Administration', 'Équipements'] as $c): ?>
                    <a href="index.php?action=feedbacks&category=<?= urlencode($c) ?><?= $typeFilter ? '&type=' . urlencode($typeFilter) : '' ?>" class="px-3 py-2 rounded-lg text-sm <?= $catFilter === $c ? 'bg-emerald-100 text-emerald-800 font-bold' : 'hover:bg-gray-100' ?>"><?= $c ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <div>
            <span class="text-xs font-bold uppercase text-gray-400 block mb-1">Type</span>
            <div class="flex flex-col gap-1">
                <?php foreach (['Coup de Gueule', 'Suggestion'] as $t): ?>
                    <a href="index.php?action=feedbacks&type=<?= urlencode($t) ?><?= $catFilter ? '&category=' . urlencode($catFilter) : '' ?>" class="px-3 py-2 rounded-lg text-sm <?= $typeFilter === $t ? 'bg-amber-100 text-amber-800 font-bold' : 'hover:bg-gray-100' ?>"><?= $t ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="lg:grid-cols-1 lg:col-span-3 space-y-6">
        <?php if (empty($feedbacks)): ?>
            <div class="bg-white p-12 rounded-xl text-center text-gray-500 border border-gray-100 shadow-sm">
                Aucun retour ne correspond à vos critères d'affichage actuels.
            </div>
        <?php endif; ?>

        <?php foreach ($feedbacks as $fb): ?>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-4">
                <div class="flex justify-between items-center">
                    <div class="flex gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600"><?= htmlspecialchars($fb['category']) ?></span>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $fb['type'] === 'Coup de Gueule' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700' ?>"><?= htmlspecialchars($fb['type']) ?></span>
                    </div>
                    <span class="text-xs text-gray-400"><?= $fb['created_at'] ?></span>
                </div>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line"><?= htmlspecialchars($fb['content']) ?></p>

                <div class="flex items-center justify-between border-t border-gray-50 pt-4">
                    <div class="flex gap-4">
                        <form action="index.php?action=vote" method="POST">
                            <input type="hidden" name="id" value="<?= $fb['id'] ?>">
                            <button class="flex items-center gap-1.5 text-sm font-semibold bg-emerald-50 text-emerald-700 px-3 py-1.5 rounded-lg hover:bg-emerald-100 transition">
                                👍 Utile (<?= $fb['votes'] ?>)
                            </button>
                        </form>
                        <form action="index.php?action=signal" method="POST">
                            <input type="hidden" name="id" value="<?= $fb['id'] ?>">
                            <button class="text-sm font-medium text-gray-400 hover:text-red-500 transition">
                                🚩 Signaler un abus
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg mt-2 space-y-2">
                    <h4 class="text-xs font-bold text-gray-500 uppercase">Discussions anonymes :</h4>
                    <?php $comments = CommentModel::getByFeedback($fb['id']); ?>
                    <?php foreach ($comments as $c): ?>
                        <div class="text-sm text-gray-600 bg-white p-2.5 rounded border border-gray-100">
                            <?= htmlspecialchars($c['content']) ?>
                        </div>
                    <?php endforeach; ?>
                    <form action="index.php?action=submit-fomment" method="POST" class="flex gap-2 mt-2">
                        <input type="hidden" name="feedback_id" value="<?= $fb['id'] ?>">
                        <input type="text" name="content" required placeholder="Répondre de manière anonyme..." class="w-full text-sm p-2 border border-gray-200 rounded outline-none bg-white focus:ring-1 focus:ring-emerald-500">
                        <button type="submit" class="bg-gray-700 text-white px-4 text-xs font-bold rounded hover:bg-gray-600">Envoyer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once 'app/views/layout/footer.php'; ?>