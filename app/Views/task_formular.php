<?php

$editing = isset($task['id']) && !empty($task['id']);
$action = $editing ? base_url('/tasks/update/' . ($task['id'] ?? '')) : base_url('/tasks/create');
?>

<div class="container-fluid mt-3">
<div class="card">
    <div class="card-header"><b><?= $editing ? 'Task bearbeiten' : 'Neuer Task' ?></b></div>
    <div class="card-body">
        <form method="post" action="<?= $action ?>">
            <?= csrf_field() ?>
            <div class="mb-3 row">
                <label for="taskbezeichnung" class="form-label col-2">Taskbezeichnung</label>
                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('taskbezeichnung') ? 'is-invalid' : '' ?> col" id="taskbezeichnung" name="taskbezeichnung" placeholder="Bezeichnung für die Tasks" value="<?= esc(old('taskbezeichnung', $editing ? ($task['task'] ?? '') : ($task['taskbezeichnung'] ?? ''))) ?>">
                <?php if (isset($validation) && $validation->hasError('taskbezeichnung')): ?>
                    <div class="invalid-feedback"><?= $validation->getError('taskbezeichnung') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3 row">
                <label for="taskartid" class="form-label col-2">Taskart</label>
                 <input type="number"  min="0" max="100" class="form-control col" id="taskartid" name="taskartid" placeholder="Taskartid eingeben" value="<?= esc(old('taskartid', $editing ? ($task['taskartenid'] ?? '') : ($task['taskartid'] ?? ''))) ?>">
            </div>

            <div class="mb-3 row">
                <label for="personid" class="form-label col-2">Person</label>
                <input type="number"  min="0" max="100" class="form-control col" id="personid" name="personid" placeholder="Personid eingeben" value="<?= esc(old('personid', $editing ? ($task['personenid'] ?? '') : ($task['personid'] ?? ''))) ?>">
            </div>

            <div class="mb-3 row">
                <label for="spaltentid" class="form-label col-2">Spalte</label>
                <input type="number"  min="0" max="100" class="form-control col" id="spaltentid" name="spaltentid" placeholder="Spaltentid eingeben" value="<?= esc(old('spaltentid', $editing ? ($task['spaltenid'] ?? '') : ($task['spaltentid'] ?? ''))) ?>">
            </div>

            <div class="mb-3">
                <label for="erinnerungsdatum" class="form-label">Erinnerungsdatum</label>
                <input type="datetime-local" class="form-control" id="erinnerungsdatum" name="erinnerungsdatum" value="<?= esc(old('erinnerungsdatum', $editing && !empty($task['erinnerungsdatum']) ? str_replace(' ', 'T', $task['erinnerungsdatum']) : '')) ?>">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="erinnerung" name="erinnerung" <?= old('erinnerung', $editing ? (!empty($task['erinnerung']) ? '1' : '') : '') ? 'checked' : ''  ?>>
                <label class="form-check-label" for="erinnerung">Erinnerung</label>
            </div>

            <div class="mb-3">
                <label for="notizen" class="form-label">Notizen</label>
                <textarea class="form-control" id="notizen" name="notizen" rows="3"><?= esc(old('notizen', $editing ? ($task['notizen'] ?? '') : ($task['notizen'] ?? ''))) ?></textarea>
            </div>


            <div class="mt-2">
                <button type="submit" class="btn btn-success"><?= $editing ? 'Aktualisieren' : 'Speichern' ?></button>
                <a class="btn btn-danger" href="<?= base_url('/tasks') ?>">Abbrechen</a>

                <?php if ($editing): ?>
                    <a class="btn btn-outline-danger" href="<?= base_url('/tasks/delete/' . ($task['id'] ?? '')) ?>" onclick="return confirm('Task wirklich löschen?')">Löschen</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
</div>

