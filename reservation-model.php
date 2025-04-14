<?php

class Reservation
{
    public $name;
    public $location;
    public $startDate;
    public $endDate;
    public $totalPrice;
    public $nightPrice;
    public $status;
    public $bookedAt;
    public $cleaningOption;

    //Pour rendre la classe plus flexible on donne au constructeur des paramètres
    public function __construct($name, $location, $startDate, $endDate, $cleaningOption)
    {
        //$this fait référence à l'objet courant (celui qui est en train d'être utilisé)
        //ici cela signifie la propriété name de cet objet

        //$name vient du paramètre passé par l'utilisateur
        $this->name = $name;
        $this->location = $location;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->cleaningOption = $cleaningOption;

        $this->nightPrice = 100;
        //valeurs calculées automatiquement
        $totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice) + 50;
        $this->totalPrice = $totalPrice;
        $this->bookedAt = new DateTime();
        $this->status = "CART";
    }

    //Si la réservation est encore en statut "CART"
    //Alors on passe au statut "CANCELLED"
    // Cela évite d'annuler une réservation déjà confirmée ou déjà annulée 
    public function cancel(){
        if($this->status === "CART"){
        $this->status= "CANCELLED";
        }
    }
}

$name = "Araya";
$location="Bahamas";
$start = new DateTime("2025-06-01");
$end = new DateTime("2025-06-21");
$cleaning= true;

//Appel du constructeur
// Grâce à ça, on peut créer autant de réservations différentes et chacune aura ses propres valeurs
$Reservation = new Reservation($name, $location, $start,$end, $cleaning);

//Appel à la fonction cancel()
$Reservation -> cancel();

var_dump($Reservation);
