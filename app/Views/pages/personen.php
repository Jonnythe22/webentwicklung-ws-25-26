<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <b>Personen</b>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Passwort</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($personen as $p): ?>
                    <tr>
                        <td><?= esc($p['id']) ?></td>
                        <td><?= esc($p['vorname']) ?></td>
                        <td><?= esc($p['name']) ?></td>
                        <td><?= esc($p['email']) ?></td>
                        <td><?= esc($p['passwort']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
