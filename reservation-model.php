<?php

class Reservation{
    public $name;
    public $location;
    public $startDate;
    public $endDate;
    public $totalPrice;
    public $nightPrice;
    public $status;
    public $bookedAt;
    public $cleaningOption;
}

$Reservation = new Reservation();

$Reservation->name = "Araya";
$Reservation->location = "Bahamas";
$Reservation->startDate= new DateTime(2025-06-01);
$Reservation->endDate = new DateTime("2025-06-31");
$Reservation->nightPrice= 100;
$Reservation->cleaningOption = true;

$totalPrice=(($Reservation->endDate->getTimestamp()-$Reservation->startDate->getTimestamp()) /(3600*24)* $Reservation->nightPrice) +50;
$Reservation->totalPrice=$totalPrice;
$Reservation->bookedAt=new DateTime();
$Reservation->status = "CART";

var_dump($totalPrice);