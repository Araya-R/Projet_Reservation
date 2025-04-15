<main>

	<h2>Créer une réservation</h2>

	<form method="POST">

		<div>
			<label>Nom
				<input type="text" name="name">
			</label>
		</div>

		<div>
			<label for="room-type">Type de chambre
				<select name="room-type">
					<option value="vue-mer">Chambre avec vue sur mer</option>
					<option value="Suite">Suite</option>
					<option value="Standard">Standard</option>
					<option value="Double">Double</option>
				</select>
			</label>
		</div>

		<div>
			<label>Date de début
				<input type="date" name="start-date">
			</label>
		</div>

		<div>
			<label>Date de fin
				<input type="date" name="end-date">
			</label>
		</div>

		<div>
			<label>Option de ménage
				<input type="checkbox" name="cleaning-option">
			</label>
		</div>

		<div>
			<button type="submit">Créer la réservation</button>
		</div>

	</form>

	<!-- vérifie que la variable $error existe et non null -->
	<?php if (!empty($error)) { ?>
		<div>
			<p>La réservation n'a pas été effectuée : <?php echo $error; ?></p>
		</div>
	<?php } ?>

	<!-- vérifie que la variable existe et non null -->
	<?php if (isset($reservationForUser)) { ?>
		<div>
			<p>Récap de la réservation :</p>
			<p>Nom : <?php echo $reservationForUser->name; ?></p>
			<p>Type de chambre : <?php echo $reservationForUser->roomType; ?></p>
			<p>Dates : <?php echo $reservationForUser->startDate->format('y-m-d'); ?> / <?php echo $reservationForUser->endDate->format('y-m-d'); ?></p>
			<p>Prix total : <?php echo $reservationForUser->totalPrice; ?></p>
			<p>Cleaning Option ? : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></p>

		</div>
	<?php } ?>

</main>

</body>

</html>