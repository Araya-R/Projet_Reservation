<?php 
require_once ('../view/home-view.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');
require_once('../config.php');

$error="";

//je vérifie si le formulaire a bien été envoyé
if($_SERVER["REQUEST_METHOD"]=== "POST"){

    //je récupère les données du formulaire
    $name=$_POST['name'];
    $roomType=$_POST['room-type'];

    //je crée des datetime pour les date (car le formulaire envoie les dates en forme de chaine caractères)
    $startDate=new DateTime($_POST['start-date']);
    $endDate= new DateTime($_POST['end-date']);

    //vérifie si la case cleaning-option est coché
    //je transforme l'option de cleaningOption si c'est On --> true et si c'est Off --> False 
    if($cleaningOption=isset($_POST['cleaning-option'])&& $_POST['cleaning-option'] === "on"){
        $cleaningOption = true;
    }else{
        $cleaningOption = false;
    }

    try{
        //Création d'une réservation 
        $Reservation = new Reservation($name, $startDate,$endDate, $cleaningOption, $roomType);
        
        //Enregistrement dans une base 
        persistReservation($Reservation);

    }catch (Exception $e){
        $error= $e->getMessage();
    }
}

$reservationForUser= findReservationForUser();

require_once ('../view/create-reservation-view.php');

