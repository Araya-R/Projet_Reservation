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
    public $cancelledAt;
    public $paidAt;
    public $comment;
    public $leavecommentAt;


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
        
        //initialisation des dates 
        $this->cancelledAt= null;
        $this->paidAt= null;
        $this->comment= null;
        $this->leavecommentAt= null;
    }

    //Si la réservation est encore en statut "CART"
    //Alors on passe au statut "CANCELLED"
    // Cela évite d'annuler une réservation déjà confirmée ou déjà annulée 
    //On stock la date de l'annulement
    //annuler une réservation
    public function cancel(){
        if($this->status === "CART"){
        $this->status= "CANCELLED";
        $this->cancelledAt = new DateTime();
        }
    }

    //passer une réservation au statut PAID
    public function payment (){
        if($this->status === "CART"){
            $this->status= "PAID";
            $this->paidAt = new DateTime();
        }

    }

    //ajouter un commentaire à la réservation
    public function leaveComment($comment){
        if($this->status === "PAID"){
            $this->comment= $comment;
            $this->leavecommentAt=new DateTime();
        }else {
            echo "Impossible de laisser un commentaire tant que la réservation n'est pas payée.";
        }

    }
}

