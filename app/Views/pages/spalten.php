<?php
/** @noinspection PhpUndefinedVariableInspection */
/** @var array $spalten */
if (!isset($spalten) || !is_array($spalten)) {
    $spalten = [];
}
?>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <b>Spalten</b>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('/spalten/formular')  ?>">
                <button type="button" class="btn btn-primary mb-1 ">Neu</button>
            </a>
            <table class="table table-bordered">
                <tr>
                    <th> ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Aktionen</th>
                </tr>

                <?php if (!empty($spalten)): ?>
                    <?php foreach ($spalten as $s): ?>
                        <tr>
                        <td> <?= esc($s['id'] ?? '-') ?></td>
                        <td><?= esc($s['boardsid'] ?? '-') ?></td>
                        <td><?= esc($s['sortid'] ?? '-') ?></td>
                        <td><?= esc($s['spalte'] ?? '-') ?></td>
                        <td><?= esc($s['spaltenbeschreibung'] ?? '-') ?></td>
                        <td>
                            <a class="fa-solid fa-pen-to-square"  href="<?= base_url('/spalten/edit/' . (int)$s['id']) ?>"></a>

                            <form method="post" action="<?= base_url('/spalten/delete/' . (int)$s['id']) ?>" style="display:inline-block;" onsubmit="return confirm('Spalte wirklich löschen?');">
                                <?= csrf_field() ?>

                                <button type="submit" class="btn btn-sm btn-link p-0 text-danger" >
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Keine Spalten gefunden</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>


