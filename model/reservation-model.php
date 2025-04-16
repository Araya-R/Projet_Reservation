<?php

class Reservation
{
    public $name;
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
    public $roomType;

    //tableau des prix par Bedroom Type

    public $roomPrices =[
        'vue-mer' => 150,
        'Suite' => 100,
        'Standard' => 50,
        'Double' => 70,
    ];


    //Pour rendre la classe plus flexible on donne au constructeur des paramètres
    public function __construct($name, $startDate, $endDate, $cleaningOption,$roomType)
    {
        if(strlen($name)< 3){
            throw new Exception ("le nombre de caractère doit avoir plus de deux caractères.");
        }

        //$this fait référence à l'objet courant (celui qui est en train d'être utilisé)
        //ici cela signifie la propriété name de cet objet

        //$name vient du paramètre passé par l'utilisateur
        $this->name = $name;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->cleaningOption = $cleaningOption;
        $this->roomType=$roomType;
       
        //Vérifie si le type de chambre est valide, sinon utilise un prix par défaut
        $this->nightPrice = isset($this->roomPrices[$roomType])? $this->roomPrices[$roomType]:80;

        //calcul du prix total
        $nights = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24));
        $this->totalPrice = $nights*$this->nightPrice;
        
        //ajout le cleaning si activé 
        if ($this->cleaningOption){
            $this->totalPrice += 50;
        }
        
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

        //vérifier si la réservation est en statut CART avant de l'annuler
        if($this->status === "CART"){
        $this->status= "CANCELLED";
        $this->cancelledAt = new DateTime();
        }else{
            throw new Exception("La réservation ne peut pas être annulée, car elle est déjà payée .");
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
            throw new Exception("Impossible de laisser un commentaire tant que la réservation n'est pas payée.");
            
        }

    }
}

