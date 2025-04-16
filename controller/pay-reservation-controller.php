<?php
require_once('../view/home-view.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

//je récupère la réservation 
$reservationForUser = findReservationForUser();

$message = "";

//je vérifie si le formulaire a bien été envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($reservationForUser) {
        
        //Payer la réservation
        //la fonction payment () existe déjà dans reservation-model
        $reservationForUser->payment();

        //réenregistrer dans la session
        //la fonction persistReservation existe dans reservation-repository
        persistReservation($reservationForUser);

        //afficher un message
        $message = "La réservation a bien été payée.";
    } else {
        $message = "Aucune réservation à payer.";
    }
}
require_once('../view/pay-reservation-view.php');
