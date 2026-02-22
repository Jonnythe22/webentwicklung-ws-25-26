<?php
$editing = isset($board['id']) && !empty($board['id']);
$action = $editing ? base_url('/boards/update/' . ($board['id'] ?? '')) : base_url('/boards/create');
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header"><b><?= $editing ? 'Board bearbeiten' : 'Neues Board' ?></b></div>
        <div class="card-body">
            <form method="post" action="<?= $action ?>">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="board" class="form-label">Bezeichnung des Boards</label>
                    <input type="text" class="form-control <?= isset($validation) && $validation->hasError('board') ? 'is-invalid' : '' ?>" id="board" name="board" value="<?= esc(old('board', $editing ? ($board['board'] ?? '') : ($board['board'] ?? ''))) ?>">
                    <?php if (isset($validation) && $validation->hasError('board')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('board') ?></div>
                    <?php endif; ?>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Speichern</button>
                    <a href="<?= base_url('/boards') ?>" class="btn btn-secondary">Abbrechen</a>
                </div>

            </form>
        </div>
    </div>
</div>
