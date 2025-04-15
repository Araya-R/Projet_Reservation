<?php

//Utilisation de la session = stocker temporairement une réservation
function persistReservation ($Reservation){

    //je démarre la session et j'enregistre l'objet Reservation dans la session
    session_start();
    $_SESSION["Reservation"] = $Reservation;
}

function findReservationForUser(){
    session_start();
    return $_SESSION["Reservation"];

}