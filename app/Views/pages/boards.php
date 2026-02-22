<?php
if (!isset($boards) || !is_array($boards)) {
    $boards = [];
}
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <b>Boards</b>
        </div>
        <div class="card-body">
            <a href="<?= base_url('/boards/formular') ?>" class="btn btn-primary mb-2">Neu</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Bezeichnung</th>
                    <th>Aktionen</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($boards)): ?>
                    <?php foreach ($boards as $b): ?>
                        <tr>
                            <td><?= esc($b['id'] ?? '-') ?></td>
                            <td><?= esc($b['board'] ?? '-') ?></td>
                            <td>
                                <a class="btn btn-sm btn-outline-secondary" href="#" title="Bearbeiten"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-sm btn-outline-danger" href="#" title="Löschen"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Keine Boards gefunden</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
