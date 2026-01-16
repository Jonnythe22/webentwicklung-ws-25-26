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
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= esc($t['task']) ?>
                                </h5>

                                <p class="card-text mb-1">
                                    <small class="text-muted">Erinnerungsdatum:</small><br>
                                    <?= esc($t['erinnerungsdatum'] ?? '-') ?>
                                </p>

                                <p class="card-text">
                                    <small class="text-muted">ID:</small>
                                    <?= esc($t['id']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>