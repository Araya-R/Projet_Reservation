

<main>
	
	<h2>Créer une réservation</h2>

<form method="POST">

		<label>Nom
			<input type="text" name="name">
		</label>

		<label>BedRoom Type
			<select name="type">
				<option value="vue-mer">Chambre avec vue sur mer</option>
				<option value="Suite">Suite</option>
				<option value="Standard">Standard</option>
				<option value="Double">Double</option>
			</select>
		</label>

		<label>Date de début
			<input type="date" name="start-date">
		</label>

		<label>Date de fin
			<input type="date" name="end-date">
		</label>

		<label>Option de ménage
			<input type="checkbox" name="cleaning-option">
		</label>

		<button type="submit">Créer la réservation</button>

	</form>


	<h2><?php echo $message; ?></h2>

</main>

</body>
</html>