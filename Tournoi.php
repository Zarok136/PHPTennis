<?php

class Tournoi
{
    private static array $joueurs = [];
    private static array $matchs = [];

    public static function ajouterJoueur(JoueurInterface $joueur) : void {
         self::$joueurs[] = $joueur;
    }

    public static function getJoueurs() : void {
        print_r(self::$joueurs);
    }

    public static function getJoueur(int $index) : JoueurInterface {
        return self::$joueurs[$index];
    }

    public static function modifierJoueur(int $index, JoueurInterface $joueur) {

        if (isset(self::$joueurs[$index])) {
            // Demande des nouvelles valeurs à l'utilisateur
            $nom = readline("Entrez le nouveau nom: ");
            $prenom = readline("Entrez le nouveau prénom: ");

            // Assignation via les setteurs de la classe Joueur
            $joueur->setNom($nom);
            $joueur->setPrenom($prenom);

            // Affichage de la modification
            print("Utilisateur modifié avec succès");
        } else {
            echo "L'index spécifié n'existe pas.\n";
        }
    }

    public static function supprimerJoueur(int $index) : string {
        if (isset(self::$joueurs[$index])) {
            unset(self::$joueurs[$index]);
            return print("L'utilisateur $index a bien été supprimé\n");
            } else {
            return print(RED."L'utilisateur n'existe pas\n".RESET_COLOR);
        }
    }

    public static function creerMatch($index1,$index2) : void {
        $match = new TennisMatch(self::$joueurs[$index1], self::$joueurs[$index2]);
        self::$matchs[] = $match;

        // Selection des joueurs
        self::$joueurs[$index1]->getNom();
        self::$joueurs[$index2]->getNom();
    }

    public static function listerMatchs() : void {
        print_r(self::$matchs);
    }
}