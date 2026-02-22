<?php
if (!isset($board) || !is_array($board)) {
    $board = [];
}
if (!isset($boards) || !is_array($boards)) {
    $boards = [];
}
$selectedBoardId = $selectedBoardId ?? null;
?>

<div class="container-fluid mt-3 mb-5">

    <div class="card">

        <div class="card-header fw-bold d-flex justify-content-between align-items-center">
            <div>Tasks</div>
            <div class="d-flex gap-2 align-items-center">
                <form method="get" action="<?= base_url('/tasks') ?>">
                    <select name="boardid" class="form-select form-select-sm" onchange="this.form.submit()">
                        <?php foreach ($boards as $b): ?>
                            <option value="<?= esc($b['id']) ?>" <?= (int)$b['id'] === (int)$selectedBoardId ? 'selected' : '' ?>><?= esc($b['board'] ?? $b['id']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
                <a href="<?= base_url('/tasks/new') ?>" class="btn btn-primary btn-sm">Neu</a>
            </div>
        </div>

        <div class="card-body">

            <div class="d-flex flex-row flex-nowrap overflow-auto">

                <?php foreach ($board as $spalte): ?>
                    <div class="card me-3" style="min-width: 300px;">

                        <div class="card-header fw-bold text-center">
                            <?= esc($spalte['name']) ?>
                        </div>

                        <div class="card-body task-list" id="spalte-<?= $spalte['id'] ?>">

                            <?php foreach ($spalte['tasks'] as $task): ?>
                                <div class="card mb-2" data-task-id="<?= $task['id'] ?>">
                                    <div class="card-body p-2 position-relative">

                                        <button class="btn btn-sm btn-light position-absolute top-0 end-0 m-1"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#actions-<?= $task['id'] ?>"
                                                aria-expanded="false"
                                                aria-controls="actions-<?= $task['id'] ?>">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </button>

                                        <div class="fw-semibold">
                                            <?php if (!empty($task['taskartenicon'])): ?>
                                                <i class="<?= esc($task['taskartenicon']) ?> me-1"></i>
                                            <?php endif; ?>
                                            <?= esc($task['task']) ?>
                                        </div>

                                        <?php if (!empty($task['vorname'])): ?>
                                            <div class="small text-muted">
                                                👤 <?= esc($task['vorname'] . ' ' . $task['name']) ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="small text-muted">
                                            📅 <?= esc($task['erinnerungsdatum'] ?? '-') ?>
                                        </div>

                                        <div class="collapse mt-2" id="actions-<?= $task['id'] ?>">
                                            <div class="d-flex gap-2">
                                                <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>"
                                                   class="btn btn-sm btn-outline-secondary w-50">
                                                    ✏️ Bearbeiten
                                                </a>

                                                <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>"
                                                   class="btn btn-sm btn-outline-danger w-50"
                                                   onclick="return confirm('Task löschen?')">
                                                    🗑 Löschen
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="card-footer text-center">
                            <a href="<?= base_url('/tasks/new?spaltenid=' . $spalte['id']) ?>"
                               class="btn btn-sm btn-primary">
                                Neu
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<script>
    const taskContainers = Array.from(document.querySelectorAll('.task-list'));

    function getCsrfToken() {
        const name = 'csrf_cookie_name=';
        const cookies = document.cookie.split(';');
        for (let c of cookies) {
            c = c.trim();
            if (c.startsWith(name)) return decodeURIComponent(c.substring(name.length));
        }
        return '';
    }

    function saveContainerOrder(container) {
        const spaltenId = parseInt(container.id.replace('spalte-', ''));
        const taskCards = container.querySelectorAll('[data-task-id]');
        taskCards.forEach(function (card, index) {
            const taskId = parseInt(card.getAttribute('data-task-id'));
            fetch('<?= base_url('/tasks/move') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken(),
                },
                body: JSON.stringify({
                    taskId:    taskId,
                    spaltenId: spaltenId,
                    sortid:    index,
                }),
            });
        });
    }

    dragula(taskContainers, {
        invalid: function (el) {
            return el.classList.contains('collapse') || el.tagName === 'A' || el.tagName === 'BUTTON';
        }
    }).on('drop', function (el, target, source) {
        saveContainerOrder(target);
        if (source !== target) {
            saveContainerOrder(source);
        }
    });
</script>
