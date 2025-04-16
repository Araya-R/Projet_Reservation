<?php
require_once('../view/home-view.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

//récupérer la réservation de l'user depuis la session

$reservationForUser = findReservationForUser();
$error = ""; //  variable pour afficher les errreurs
$message = ""; //variable pour afficher les messages de succès

//vérifier si u commentaire a été soumis par l'user

$comment="";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($reservationForUser) {
        //récupérer le commentaire soumis par l'user
        $comment = isset($_POST['comment'])? $_POST['comment']: "";

        //valider le commentaire
        if (empty($comment)) {
            $error = "Le commentaire ne pas être vide.";
        } else {
            try {
                //ajouter le commentaire à la réservation 
                //la fonction leaveComment($comment) existe déjà
                $reservationForUser->leaveComment($comment);

                //réenregistrer la réservation dans la session
                persistReservation($reservationForUser);

                //afficher un message de succès
                $message = "Votre commentaire a bien été envoyé.";
            } catch (Exception $e) {
                //en cas d'erreur, afficher ce message
                $error = $e->getMessage();
            }
        }
    }else{
        $error="Aucune réservation à modifier.";
    }
}

require_once('../view/comment-reservation-view.php');
