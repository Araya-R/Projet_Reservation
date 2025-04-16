	<!-- vérifie que la variable existe et non null -->
	<?php if (isset($reservationForUser)) { ?>
		<div>
			<p>Récap de la réservation :</p>
			<p>Nom : <?php echo $reservationForUser->name; ?></p>
			<p>Type de chambre : <?php echo $reservationForUser->roomType; ?></p>
			<p>Dates : <?php echo $reservationForUser->startDate->format('y-m-d'); ?> / <?php echo $reservationForUser->endDate->format('y-m-d'); ?></p>
			<p>Prix total : <?php echo $reservationForUser->totalPrice; ?></p>
			<p>Cleaning Option ? : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></p>
			<p>Status: <?php echo $reservationForUser->status; ?></p>
			<p>Commentaire: <?php echo $reservationForUser->comment ; ?></p>
		</div>
	<?php } ?>