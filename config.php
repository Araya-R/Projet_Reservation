<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//La fonction ser à établir une connexion à une DB MySQL
//via l'extension PDO (PHP Data Object) = méthode recommandée
//cette fonction ne prend pas de parametre et retourne une connexion PDO
function connectToDB() {

    //On utilise le bloc try/catch pour tenter de se connecter à la DB 
    //et capturer les erreurs en cas d'echec
	try {
        //PDO = objet ->cette ligne établit la connexion à la base
		$pdo = new PDO("mysql:host=localhost:8889;dbname=Projet_Reservation", "root", "root");
		//permet d'activer le mode "exception" pour les erreurs SQL
        //sans ça, les erreurs passent souvent inaperçues/difficiles à débugger
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	} catch(PDOException $e) {
		throw new Exception("Impossible de se connecter à la DB : " . $e->getMessage());
	}
    //si une erreur survient (mauvais mdp/base inconnue/...), elle est capturée ici
}

