<?php
require_once('../view/home-view.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

//j'utilise la fonction findReservationForUser 
//afin de récupérer la réservation crée par l'user 
//celle ci est stockée ensuite dans la variable $reservationForUser
$reservationForUser = findReservationForUser();

$message = "";
//je vérifie si le formulaire a bien été envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //je récupère la réservation 
    $reservationForUser = findReservationForUser();

    if ($reservationForUser) {

        try {
            //annuler la réservation
            //la fonction cancel () existe déjà dans reservation-model
            $reservationForUser->cancel();

            //réenregistrer dans la session
            //la fonction persistReservation existe dans reservation-repository
            persistReservation($reservationForUser);

            //afficher un message
            $message = "La réservation a bien été annulée.";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    } else {
        $message = "Aucune réservation à annuler.";
    }
}

require_once('../view/cancel-reservation-view.php');
