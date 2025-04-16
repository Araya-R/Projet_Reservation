<?php
require_once ('../view/home-view.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

//j'utilise la fonction findReservationForUser 
//afin de récupérer la réservation crée par l'user 
//celle ci est stockée ensuite dans la variable $reservationForUser
$reservationForUser= findReservationForUser();

require_once('../view/cancel-reservation-view.php');
