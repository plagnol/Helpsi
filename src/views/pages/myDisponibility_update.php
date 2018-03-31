<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 17:50
 */
?>

<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
	<div class="container">
		<div class="row">
			<h3 class="mt-2">
				<span><?= $userinfo['fname'] . ' ' . $userinfo['lname'];?>.</span>
			</h3>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /blue -->
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
                    <th scope="col">Sélection</th>
					<th scope="col">Tuteur</th>
					<th scope="col">Date</th>
					<th scope="col">Heure début</th>
					<th scope="col">Heure fin</th>
				</tr>
			</thead>
			<tbody>
                <?php
                
                foreach ($array as $result) {
                    $dateD = explode(" ", $result['startdate']);
                    $dateF = explode(" ", $result['duration']);
                    echo '<tbody>
                        <tr>
                            <td>
                                <form method="post" action="editDisponibility.php">
                                    <input value="Modifier" type="submit" name="submit">
                                    <input value="'.$result['available_id'].'"type="hidden" name="available_id">
                                </form>
                            </td>
                            <td scope="row">' . $result['lname'] . ' ' . $result['fname'] . '</td>
                            <td>' . $dateD[0] . '</td>
                            <td>' . $dateD[1] . '</td>
                            <td>' . $dateF[1] . '</td>
                          </tr>
                      </thead>';
                }
                
                ?>
                </tbody>
		</table>
		<br><br>
	</div>
</div>