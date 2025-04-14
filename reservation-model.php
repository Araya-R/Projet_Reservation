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

    public function __construct()
    {
        //$this fait référence à l'objet courant (celui qui est en train d'être utilisé)
        //ici cela signifie la propriété name de cet objet
        $this->name = "Araya";
        $this->location = "Bahamas";
        $this->startDate = new DateTime("2025-06-01");
        $this->endDate = new DateTime("2025-06-30");
        $this->nightPrice = 100;
        $this->cleaningOption = true;

        //valeurs calculées automatiquement
        $totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice) + 50;
        $this->totalPrice = $totalPrice;
        $this->bookedAt = new DateTime();
        $this->status = "CART";
    }
}

$Reservation = new Reservation();

var_dump($Reservation);
