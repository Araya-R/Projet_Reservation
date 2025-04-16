<?php
// récupère l'url demandée
$requestUri = $_SERVER['REQUEST_URI'];


//j'enlève /Projet_Reservation/public/ pour ne garder que la dernière partie 
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/Projet_Reservation/public/', '', $uri);
$endUri = trim($endUri, '/');


// ensuite je fais mon rooutage  avec des if
//ex: si on visite /Projet_Reservation/public/ (l'user ne met rien à la fin),
// ça charge home-controller.php
if ($endUri === "") {
    require_once('../controller/home-controller.php');

} else if ($endUri === "nouvelle-reservation") {
	require_once('../controller/create-reservation-controller.php');

} else if ($endUri === "annuler-reservation") {
	require_once('../controller/cancel-reservation-controller.php');

} else if ($endUri === "payer-reservation") {
	require_once('../controller/pay-reservation-controller.php');

} else if ($endUri === "commenter-reservation") {
	require_once('../controller/comment-reservation-controller.php');
} 