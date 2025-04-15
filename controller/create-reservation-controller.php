<?php 
require_once ('../view/home-view.php');
require_once('../model/reservation-model.php');


//je crée une variable $message qui est vide
$message="";

//je vérifie si le formulaire a bien été envoyé
if($_SERVER["REQUEST_METHOD"]=== "POST"){

    //je récupère les données du formulaire
    $name=$_POST['name'];
    $location=$_POST['type'];

    //je crée des datetime pour les date (car le formulaire envoie les dates en forme de chaine caractères)
    $startDate=new DateTime($_POST['start-date']);
    $endDate= new DateTime($_POST['end-date']);

    //je transforme l'option de cleaningOption si c'est On --> true et si c'est Off --> False 
    if($_POST['cleaning-option'] === "on"){
        $cleaningOption = true;
    }else{
        $cleaningOption = false;
    }


//Création d'une réservation 
$Reservation = new Reservation($name, $location, $startDate,$endDate, $cleaningOption);

$message= "Votre réservation est confirmée! Le prix total est de ". $Reservation->totalPrice;

}

require_once ('../view/create-reservation-view.php');

