<?php

//Pour évviter les appels multiples à session_start():
//session_start() ne peut être appelé qu'une seule fois par requête HTTP.
function startSessionIfNotStarted() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

//Utilisation de la session = stocker temporairement une réservation
function persistReservation ($Reservation){

    //appel de la fct connectToDB pour établir une connexion avec la DB
    //connexion sauvegardée dans la variable $pdo
    $pdo=connectToDB();

    //formatage des dates compatibles avec MySQL
    $startDateFormatted  = $Reservation->startDate->format('Y-m-d');
    $endDateFormatted    = $Reservation->endDate->format('Y-m-d');
    $bookedAtFormatted   = $Reservation->bookedAt->format('Y-m-d');

    //requête SQL (insert) inserer les valeurs de l'objet $Reservation
    //dans la table reservation
    $query = "INSERT INTO reservation
	(name, roomType, StartDate, endDate, cleaningOption,
	 nightPrice, totalPrice, bookedAt, status)
	VALUES
	(
		'$Reservation->name',
		'$Reservation->roomType',
		'$startDateFormatted',
		'$endDateFormatted',
		$Reservation->cleaningOption,
		$Reservation->nightPrice,
		$Reservation->totalPrice,
		'$bookedAtFormatted',
		'$Reservation->status'
	)";

    //la méthode query() de PDO utilisée pour exécuter cette requête 
	$pdo->query($query);
}
function findReservationForUser(){
    
    //on stock les données grâce à la session
    startSessionIfNotStarted();

    //on vérifie si la clé Reservation existe dans $_SESSION
    if(array_key_exists('Reservation',$_SESSION)){

        //si oui renvoie la réservation stocké 
        return $_SESSION["Reservation"];
    }else{
        //si non, renvoie null
        return null;
    }
}
