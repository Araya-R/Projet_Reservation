<?php

//Utilisation de la session = stocker temporairement une réservation
function persistReservation ($Reservation){

    //je démarre la session et j'enregistre l'objet Reservation dans la session
    session_start();
    $_SESSION["Reservation"] = $Reservation;
}

function findReservationForUser(){
    
    //on stock les données grâce à la session
    session_start();

    //on vérifie si la clé Reservation existe dans $_SESSION
    if(array_key_exists('Reservation',$_SESSION)){

        //si oui renvoie la réservation stocké 
        return $_SESSION["Reservation"];
    }else{
        //si non, renvoie null
        return null;
    }
}