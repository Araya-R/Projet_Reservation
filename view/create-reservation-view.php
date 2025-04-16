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

	<?php require_once ('../view/partials/_resume-reservation-view.php') ?>
</main>

</body>

</html>