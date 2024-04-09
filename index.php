<?php

require_once ('tools.php');
function retour():void{
    readline("APPUYEZ SUR ENTREE POUR REVENIR AU MENU");
    echo CLEAR;
}

do{

    echo MENU;

    $choixUtilisateur= readline("Entrez votre choix: ");
    if(empty($choixUtilisateur)){
        echo RED."ERREUR: SAISIE INCORRECTE - APPUYEZ SUR ENTREE POUR REVENIR AU MENU".RESET_COLOR;
        readline();
        echo CLEAR ;
    }elseif($choixUtilisateur>6){
        echo RED."ERREUR: LE NUMERO N'EST PAS ATTRIBUE - APPUYEZ SUR ENTREE POUR REVENIR AU MENU".RESET_COLOR;
        readline();
        echo CLEAR;
    }

    switch ($choixUtilisateur){
        case 1 : {
            $nom=readline("Entrez le nom du joueur: ");
            $prenom=readline("Entre le prénom du joueur: ");
            $joueur = new Joueur($nom,$prenom);
            Tournoi::ajouterJoueur($joueur);
            retour();
            break;
        }
        case 2 :{
            $index = (int)readline("Veuillez taper le numéro du joueur");
            $joueur = Tournoi::getJoueur($index);
            Tournoi::modifierJoueur($index, $joueur);
            retour();
            break;
        }
        case 3:{
            $index = (int)readline("Veuillez taper le numéro du joueur");
            Tournoi::supprimerJoueur($index);
            retour();
            break;
        }
        case 4:{
            Tournoi::getJoueurs();
            retour();
            break;
        }
        case 5:{
            Tournoi::creerMatch(0,1);
            break;
        }
        case 6:{
            Tournoi::listerMatchs();
            retour();
            break;
        }
        case 0:
            exit;
    }
}while($choixUtilisateur !=0);