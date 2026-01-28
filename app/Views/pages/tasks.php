<div class="container-fluid mt-3">
    <div class="card mb-5">
        <div class="card-header">
            <b>Tasks</b>
        </div>

        <div class="card-body">
            <a class="btn btn-primary m-2" href="/tasks/task_formular">Neu</a>
            <div class="row g-3">

                <?php foreach ($tasks as $t): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">
                                    <?= esc($t['task']) ?>
                                </h5>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Erinnerungsdatum:</small><br>
                                    <?= esc($t['erinnerungsdatum'] ?? '-') ?>
                                </p>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Taskarten ID:</small>
                                    <?= esc($t['taskartenid'] ?? '-') ?>
                                </p>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Person ID:</small>
                                    <?= esc($t['personenid'] ?? '-') ?>
                                </p>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Spalte ID:</small>
                                    <?= esc($t['spaltenid'] ?? '-') ?>
                                </p>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Erinnerung aktiv:</small>
                                    <?= !empty($t['erinnerung']) ? 'Ja' : 'Nein' ?>
                                </p>

                                <p class="card-text mb-2">
                                    <small class="text-muted">Erledigt:</small>
                                    <?= !empty($t['erledigt']) ? 'Ja' : 'Nein' ?>
                                </p>

                                <div class="mt-auto">
                                    <a class="btn btn-sm btn-outline-secondary" href="/tasks/edit/<?= esc($t['id']) ?>">Bearbeiten</a>
                                    <a class="btn btn-sm btn-outline-danger" href="/tasks/delete/<?= esc($t['id']) ?>" onclick="return confirm('Task wirklich löschen?')">Löschen</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>