<?php

$editing = isset($spalte['id']) && !empty($spalte['id']);
$action = $editing ? base_url("/spalten/update/" . (int)$spalte['id']) : base_url('/spalten/create');
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <b><?= $editing ? 'Spalte bearbeiten' : 'Neue Spalte' ?></b>
        </div>
        <div class="card-body">
            <form method="post" action="<?= $action ?>">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="spalte" class="form-label">Spaltenbezeichnung</label>
                    <input type="text" class="form-control <?= isset($validation) && $validation->hasError('spalte') ? 'is-invalid' : '' ?>" id="spalte" name="spalte" value="<?= esc(old('spalte', $spalte['spalte'] ?? '')) ?>" required>
                    <?php if (isset($validation) && $validation->hasError('spalte')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('spalte') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="spaltenbeschreibung" class="form-label">Spaltenbeschreibung</label>
                    <textarea class="form-control <?= isset($validation) && $validation->hasError('spaltenbeschreibung') ? 'is-invalid' : '' ?>" id="spaltenbeschreibung" name="spaltenbeschreibung"><?= esc(old('spaltenbeschreibung', $spalte['spaltenbeschreibung'] ?? '')) ?></textarea>
                    <?php if (isset($validation) && $validation->hasError('spaltenbeschreibung')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('spaltenbeschreibung') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="sortid" class="form-label">Sortid</label>
                    <input type="number" class="form-control <?= isset($validation) && $validation->hasError('sortid') ? 'is-invalid' : '' ?>" id="sortid" name="sortid" value="<?= esc(old('sortid', $spalte['sortid'] ?? '')) ?>">
                    <?php if (isset($validation) && $validation->hasError('sortid')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('sortid') ?></div>
                    <?php endif; ?>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Speichern</button>
                    <a href="<?= base_url('/spalten') ?>" class="btn btn-secondary">Abbrechen</a>
                </div>

            </form>
        </div>
    </div>
</div>
