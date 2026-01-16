
    <div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header"><b>Neuer Task</b></div>
        <div class="card-body">
            <form>
                <div class="mb-3 row">
                    <label for="taskbezeichnung" class="form-label col-2" requierd>Taskbezeichnung</label>
                    <input type="text" class="form-control col" id="taskbezeichnung" placeholder="Bezeichnung für die Tasks" >
                </div>

                <div class="mb-3 row">
                    <label for="taskartid" class="form-label col-2" requierd>Taskart</label>
                    <input type="number"  min="0" max="100" class="form-control col" id="taskartid" placeholder="Taskartid eingeben">
                </div>

		<div class="mb-3 row">
                    <label for="persontid" class="form-label col-2" requierd>Person</label>
                    <input type="number"  min="0" max="100" class="form-control col" id="personid" placeholder="Personid eingeben">
                </div>

		<div class="mb-3 row">
                    <label for="spaltenid" class="form-label col-2" requierd>Spalte</label>
                    <input type="number"  min="0" max="100" class="form-control col" id="spaltentid" placeholder="Spaltentid eingeben">
                </div>

		<div class="mb-3">
                    <label for="erinnerungsdatum" class="form-label" requierd>Erinnerungsdatum</label>
                    <input type="datetime-local" class="form-control" id="erinnerungsdatum" name="erinnerungsdatum">
                </div>

		<div class="form-check">
 		 <input class="form-check-input" type="checkbox" value="" id="erinnerung">
  		<label class="form-check-label" for="erinnerung">
   		Erinnerung
 		 </label>
		</div>

		<div class="mb-3">
  		<label for="notizen" class="form-label">Notizen hier reinschreiben.</label>
  		<textarea class="form-control" id="notizen" rows="3"></textarea>
		</div>
              
            </form>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Speichern</button>
                <a type="button" class="btn btn-danger" href="https://team09.wi1cm.uni-trier.de/public/tasks">Abbrechen</a>
		<button type="button" class="btn btn-danger" href="/tasks">L&ouml;schen</button>
            </div>

        </div>
    </div>
    </div>

