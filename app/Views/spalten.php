



<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <b>Spalten</b>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('/spalten/formular')  ?>">
                <button type="button" class="btn btn-primary mb-1 ">Erstellen</button>
            </a>
            <table class="table table-bordered">
                <tr>
                    <th> ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Allgemeine Tools</td>
                    <td>100</td>
                    <td>zu besprechen</td>
                    <td>Noch zu besprechende Todos</td>
                    <td><i class="fa-solid fa-pen-to-square"></i><i class="fa-solid fa-trash"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Allgemeine Tools</td>
                    <td>200</td>
                    <td>zu bearbeiten</td>
                    <td>Todos die aktuell noch bearbeitet werden</td>
                    <td><i class="fa-solid fa-pen-to-square"></i><i class="fa-solid fa-trash"></i></td>
                </tr>
            </table>
        </div>
    </div>
</div>