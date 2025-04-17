<?php
require_once('../config.php');

// URL demandée
$requestUri = $_SERVER['REQUEST_URI'];

// // Récupère le dossier dans lequel se trouve le script index.php
// $scriptName = $_SERVER['SCRIPT_NAME'];       // ex: /Projet_Reservation/public/index.php
// $basePath = dirname($scriptName);     // ex: /Projet_Reservation/public

// découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://localhost:8888/oop-piscine/public/test"
// $enduri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/Projet_Reservation/public/', '', $uri);
$endUri = trim($endUri, '/');


// Routage
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