
    <div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header"><b>Spalte erstellen</b></div>
        <div class="card-body">
            <form>
                <div class="mb-3 row">
                    <label for="spaltenbezeichnung" class="form-label col-2">Spaltenbezeichnung</label>
                    <input type="text" class="form-control col" id="spaltenbezeichnung" placeholder="Bezeichnung für die Spalte" >
                </div>

                <div class="mb-3 row">
                    <label for="spaltenbeschreibung" class="form-label col-2">Spaltenbeschreibung</label>
                    <textarea class="form-control col" id="spaltenbeschreibung" rows="3"></textarea>
                </div>

                <div class="mb-3 row">
                    <label for="sortid" class="form-label col-2">Sortid</label>
                    <input type="text" class="form-control col" id="sortid" placeholder="Sortid eingeben">
                </div>


                <div class="mb-3 row">
                    <label for="select" class="form-label col-2">Board auswählen</label>
                    <select class="form-select col" id="select">
                        <option value="1">Allgemeine Tools</option>
                        <option value="2">Spezifische Tool</option>
                        <option value="3">Neue Tools</option>
                    </select>
                </div>

            </form>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Speichern</button>
                <button type="button" class="btn btn-danger">Abbrechen</button>
            </div>

        </div>
    </div>
    </div>

