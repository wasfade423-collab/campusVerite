<?php
require_once 'app/views/layout/header.php';
$catFilter = $_GET['category'] ?? null;
$typeFilter = $_GET['type'] ?? null;
$feedbacks = FeedbackModel::getAll($catFilter, $typeFilter);
?>

<div class="space-y-8">
    <!-- Header section -->
    <div class="mb-8">
        <h1 class="text-4xl font-black text-gray-900 mb-2">Fil d'actualité</h1>
        <p class="text-gray-600">Découvrez ce que pense la communauté universitaire</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Sidebar - Filtres -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <!-- Header filtres -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span>🔍 Filtrer</span>
                    </h3>
                </div>

                <!-- Contenu filtres -->
                <div class="p-6 space-y-6">
                    <!-- Catégories -->
                    <div>
                        <p class="text-xs font-bold uppercase text-gray-400 block mb-3">Catégories</p>
                        <div class="flex flex-col gap-2">
                            <a href="index.php?action=feedbacks" class="px-4 py-2.5 rounded-lg text-sm font-medium transition <?= !$catFilter ? 'bg-emerald-100 text-emerald-700' : 'text-gray-700 hover:bg-gray-100' ?>">
                                ✓ Tous les avis
                            </a>
                            <?php foreach (['Pédagogie', 'Infrastructure', 'Administration', 'Équipements'] as $c): ?>
                                <a href="index.php?action=feedbacks&category=<?= urlencode($c) ?><?= $typeFilter ? '&type=' . urlencode($typeFilter) : '' ?>" class="px-4 py-2.5 rounded-lg text-sm font-medium transition <?= $catFilter === $c ? 'bg-emerald-100 text-emerald-700' : 'text-gray-700 hover:bg-gray-100' ?>">
                                    <?php 
                                        $emojis = ['Pédagogie' => '📚', 'Infrastructure' => '🏢', 'Administration' => '📁', 'Équipements' => '💻'];
                                        echo $emojis[$c] . ' ' . $c;
                                    ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <!-- Types -->
                    <div>
                        <p class="text-xs font-bold uppercase text-gray-400 block mb-3">Type d'avis</p>
                        <div class="flex flex-col gap-2">
                            <?php foreach (['Coup de Gueule', 'Suggestion'] as $t): ?>
                                <a href="index.php?action=feedbacks&type=<?= urlencode($t) ?><?= $catFilter ? '&category=' . urlencode($catFilter) : '' ?>" class="px-4 py-2.5 rounded-lg text-sm font-medium transition <?= $typeFilter === $t ? 'bg-amber-100 text-amber-700' : 'text-gray-700 hover:bg-gray-100' ?>">
                                    <?php 
                                        $emojis = ['Coup de Gueule' => '💥', 'Suggestion' => '💡'];
                                        echo $emojis[$t] . ' ' . $t;
                                    ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <!-- CTA -->
                    <a href="index.php?action=create-feedback" class="block w-full bg-emerald-600 text-white font-bold py-3 rounded-xl text-center hover:bg-emerald-700 transition">
                        + Donner votre avis
                    </a>
                </div>
            </div>
        </div>

        <!-- Main content - Feedbacks -->
        <div class="lg:col-span-3 space-y-5">
            <?php if (empty($feedbacks)): ?>
                <div class="bg-white p-12 rounded-xl text-center border border-gray-100 shadow-sm">
                    <div class="text-5xl mb-4">📭</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Aucun avis ne correspond</h3>
                    <p class="text-gray-600 mb-6">Essayez de modifier vos filtres ou soyez le premier à exprimer votre avis !</p>
                    <a href="index.php?action=create-feedback" class="inline-block bg-emerald-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-emerald-700 transition">
                        Publier le premier avis
                    </a>
                </div>
            <?php endif; ?>

            <?php foreach ($feedbacks as $fb): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition overflow-hidden group">
                    <!-- Header du feedback -->
                    <div class="p-6 border-b border-gray-50">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-2 flex-wrap">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                                    <?php 
                                        $emojis = ['Pédagogie' => '📚', 'Infrastructure' => '🏢', 'Administration' => '📁', 'Équipements' => '💻'];
                                        echo ($emojis[htmlspecialchars($fb['category'])] ?? '✨') . ' ' . htmlspecialchars($fb['category']);
                                    ?>
                                </span>
                                <span class="px-3 py-1 rounded-full text-xs font-bold <?= $fb['type'] === 'Coup de Gueule' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700' ?>">
                                    <?= $fb['type'] === 'Coup de Gueule' ? '💥' : '💡' ?> <?= htmlspecialchars($fb['type']) ?>
                                </span>
                            </div>
                            <span class="text-xs text-gray-400 whitespace-nowrap ml-2">
                                <?php 
                                    $date = new DateTime($fb['created_at']);
                                    echo $date->format('d/m/Y H:i');
                                ?>
                            </span>
                        </div>
                        <p class="text-gray-800 leading-relaxed whitespace-pre-line font-medium text-base"><?= htmlspecialchars($fb['content']) ?></p>
                    </div>

                    <!-- Actions -->
                    <div class="px-6 py-4 bg-gray-50 flex items-center justify-between border-b border-gray-100">
                        <div class="flex gap-3">
                            <form action="index.php?action=vote" method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $fb['id'] ?>">
                                <button class="group/btn flex items-center gap-2 text-sm font-bold px-4 py-2 rounded-lg bg-white border border-emerald-200 text-emerald-700 hover:bg-emerald-50 hover:border-emerald-400 transition">
                                    <span class="group-hover/btn:scale-110 transition">👍</span>
                                    <span>Utile</span>
                                    <span class="text-emerald-600 font-black"><?= $fb['votes'] ?></span>
                                </button>
                            </form>
                            <form action="index.php?action=signal" method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $fb['id'] ?>">
                                <button class="text-sm font-medium text-gray-500 hover:text-red-500 hover:bg-red-50 px-4 py-2 rounded-lg transition">
                                    🚩 Signaler
                                </button>
                            </form>
                        </div>
                        <button class="toggle-comments text-sm font-medium text-gray-600 hover:text-gray-900 transition" data-feedback="<?= $fb['id'] ?>">
                            <span class="flex items-center gap-1">
                                💬 <span class="comment-count"><?php echo count(CommentModel::getByFeedback($fb['id'])); ?></span>
                            </span>
                        </button>
                    </div>

                    <!-- Section Commentaires -->
                    <div class="comments-section hidden px-6 py-5 bg-white border-t border-gray-100" data-feedback="<?= $fb['id'] ?>">
                        <div class="space-y-3 mb-4">
                            <h4 class="text-xs font-bold text-gray-500 uppercase mb-3">Discussions anonymes</h4>
                            <?php 
                                $comments = CommentModel::getByFeedback($fb['id']);
                                if (empty($comments)): 
                            ?>
                                <div class="text-center py-4 text-gray-400 text-sm">
                                    Aucune discussion pour le moment. Soyez le premier à commenter !
                                </div>
                            <?php else: ?>
                                <?php foreach ($comments as $c): ?>
                                    <div class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg border-l-2 border-emerald-500">
                                        <p><?= htmlspecialchars($c['content']) ?></p>
                                        <p class="text-xs text-gray-400 mt-2 flex justify-end">
                                            <?php 
                                                $cdate = new DateTime($c['created_at'] ?? date('Y-m-d H:i:s'));
                                                echo $cdate->format('d/m H:i');
                                            ?>
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Formulaire commentaire -->
                        <form action="index.php?action=submit-fomment" method="POST" class="flex gap-2 mt-4 pt-4 border-t border-gray-100">
                            <input type="hidden" name="feedback_id" value="<?= $fb['id'] ?>">
                            <input type="text" name="content" required placeholder="Répondre anonymement..." class="flex-1 text-sm px-3 py-2 border border-gray-300 rounded-lg outline-none bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <button type="submit" class="bg-emerald-600 text-white px-5 text-xs font-bold rounded-lg hover:bg-emerald-700 transition whitespace-nowrap">
                                Répondre
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle-comments');
        
        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const feedbackId = this.getAttribute('data-feedback');
                const section = document.querySelector(`.comments-section[data-feedback="${feedbackId}"]`);
                
                if (section) {
                    section.classList.toggle('hidden');
                    this.classList.toggle('text-emerald-600');
                }
            });
        });
    });
</script>

<?php require_once 'app/views/layout/footer.php'; ?>