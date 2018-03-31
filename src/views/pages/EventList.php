<h3>Liste des cours</h3>
<div>
    <form action="listEvent.php" role="form" class="form-inline mb-4"
          method="POST">
        <p>Cherchez votre cours !</p>
        <div class="input-group" style="width:auto;display:flex;">

            <input name="name" type="text" class="form-control"
                   placeholder="Entrer le nom du tuteur du cours que vous recherchez" autofocus>
            <button name="submitsearch" type="submit"
                    class="btn btn-secondary input-group-button"
                    style="border-radius: 0 0.25rem 0.25rem 0;">Go</button>
        </div>
    </form>


</div>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Tuteur (Campus)</th>
				<th scope="col">Date</th>
				<th scope="col">Heure début</th>
				<th scope="col">Heure fin</th>
                <th scope="col">Type</th>
				<th scope="col">Participants</th>
				<th scope="col">S'inscrire</th>
				<th scope="col">Supprimer</th>
			</tr>
		</thead>
		<tbody>
        <?php
		if (isset($_POST['submitsearch'])) {
			$UserQuery = $_POST['name'];
			$calendar = $eventUpdater->getEventListFromInput($UserQuery);
			if (empty($calendar))
            {
                echo'<p style="color:red">Aucun cours n\'a été trouvé pour '.$UserQuery.'<p>';
            }
		} else {
			$calendar = $eventUpdater->getEventList();
        }
        if (!empty($calendar))
        {
			foreach ($calendar as $rowcalendar) {
				$startendhours = $eventUpdater->getHoursFromDate($rowcalendar);
				echo '<tbody>
                        <tr>
                            <td scope="row">' . $rowcalendar->lname . ' ' . $rowcalendar->fname .' ('.$rowcalendar->city.') '.  '</td>
                            <td>' . $startendhours[0] . '</td>
                            <td>' . $startendhours[1] . '</td>
                            <td>' . $startendhours[2] . '</td>
                            <td>' . $rowcalendar->name . '</td>
                            <td>' . $rowcalendar->roaster . '</td>
                            <td>
                               <form method="post" action="listEvent.php">
                                    <input name="ajoutevent" type="hidden" value="' . $rowcalendar->event_id . '">
                                    <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-calendar-plus"></i></button>
                               </form>
                            </td>
                            <td>
                                <form method="post" action="listEvent.php">
                                    <input name="eventdelete" type="hidden" value="' . $rowcalendar->event_id . '" style="display: hidden" >
                                    <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-minus"></i></button>
                                </form>
                            </td>
                          </tr>
                      </thead>';
			}
        }

        
        ?>
            </tbody>
	</table>
</div>

