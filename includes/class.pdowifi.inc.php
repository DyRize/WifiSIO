<?php

/**
 * Classe d'accès aux données du projet WifiSIO
 *
 * Utilise les services de la classe PDO
 * pour l'application WifiSIO
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoWifi qui contiendra l'unique instance de la classe
 *
 * PHP Version 7
 *
 * @category  SLAM5
 * @package   WifiSIO
 * @author    Dylan "DyRize" LE FLOUR <dylan.leflour25@gmail.com>
 * @author    Tom "Tomu" TARDIVON <tomtardivon@hotmail.fr>
 * @author    Perrine "PeRazk" Rasca <perrine.rasca24@gmail.com>
 * @copyright 2018 TeamSLAM
 */
class PdoWifi {

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=lycbonapmut';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoWifi = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        PdoWifi::$monPdo = new PDO(
                PdoWifi::$serveur . ';' .
                PdoWifi::$bdd, PdoWifi::$user, PdoWifi::$mdp
        );
        PdoWifi::$monPdo->query('SET CHARACTER SET utf8');
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence sur un
     * objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.
     */
    public function __destruct() {
        PdoWifi::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoWifi = PdoWifi::getPdoWifi();
     *
     * @return l'unique objet de la classe PdoWifi
     */
    public static function getPdoWifi() {
        if (PdoWifi::$monPdoWifi == null) {
            PdoWifi::$monPdoWifi = new PdoWifi();
        }
        return PdoWifi::$monPdoWifi;
    }

    /**
     * Retourne les informations d'un utilisateur Etudiant
     *
     * @param String $login Adresse e-mail de l'étudiant
     * @param String $mdp   Mot de passe de l'étudiant
     *
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosUtilisateurEtudiant($login, $mdp) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'SELECT port_etudiant.num AS num, '
                . 'port_etudiant.nom AS nom, '
                . 'port_etudiant.prenom AS prenom '
                . 'FROM port_etudiant '
                . 'WHERE port_etudiant.mel = :unLogin '
                . 'AND port_etudiant.mdp = md5(:unMdp)'
        );

        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }

    /**
     * Retourne les informations d'un utilisateur Professeur
     *
     * @param String $login Adresse e-mail du Professeur
     * @param String $mdp   Mot de passe du Professeur
     *
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosUtilisateurProfesseur($login, $mdp) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'SELECT port_professeur.num AS num, '
                . 'port_professeur.nom AS nom, '
                . 'port_professeur.prenom AS prenom '
                . 'FROM port_professeur '
                . 'WHERE port_professeur.mel = :unLogin '
                . 'AND port_professeur.mdp = md5(:unMdp)'
                . 'AND port_professeur.niveau = 1'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }

    /**
     * Retourne les informations d'un administrateur
     *
     * @param String $login Adresse e-mail de l'administrateur
     * @param String $mdp   Mot de passe de l'administrateur
     *
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosAdministrateur($login, $mdp) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'SELECT port_professeur.num AS num, '
                . 'port_professeur.nom AS nom, '
                . 'port_professeur.prenom AS prenom '
                . 'FROM port_professeur '
                . 'WHERE port_professeur.mel = :unLogin '
                . 'AND port_professeur.mdp = md5(:unMdp)'
                . 'AND port_professeur.niveau = 0'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }

    /**
     * Retourne les informations d'une demande d'accès au réseau Wifi d'un 
     * utilisateur
     *
     * @param String $idDemandeur ID du demandeur
     *
     * @return un tableau avec les informations d'une demande
     */
    public function getLesInfosDemande($idDemandeur) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'SELECT demande.mac as mac, '
                . 'demande.appareil as appareil, '
                . 'demande.dateDemande as dateDemande,'
                . 'demande.etat as etat '
                . 'FROM demande '
                . 'WHERE demande.num = :unIdDemandeur'
        );
        $requetePrepare->bindParam(':unIdDemandeur', $idDemandeur, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }

    /**
     * Retourne les informations de toutes les demandes d'accès au réseau Wifi
     *
     * @return un tableau avec les informations des demandes
     */
    public function getLesInfosToutesDemande() {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'SELECT demande.mac as mac, '
                . 'demande.groupeUtilisateur as groupeUtilisateur, '
                . 'demande.appareil as appareil, '
                . 'demande.dateDemande as dateDemande,'
                . 'demande.etat as etat '
                . 'FROM demande '
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }

    /**
     * Valide l'envoi de la demande d'accès au réseau Wifi d'un 
     * utilisateur à partir des informations fournies en paramètre
     *
     * @param String $adresseMac        Adresse Mac du demandeur
     * @param String $idDemandeur       ID du demandeur
     * @param String $appareil          Appareil du demandeur
     * @param String $groupeUtilisateur Groupe d'utilisateur du demandeur
     * @param Float  $date              Date de la demande au format français jj//mm/aaaa
     *
     * @return null
     */
    function valideEnvoiDemande(
            $adresseMac, $idDemandeur, $appareil, $groupeUtilisateur, $date, $etat
    ) {

        $requetePrepare = PdoWifi::$monPdo->prepare(
                'INSERT INTO demande '
                . 'VALUES (:uneAdresseMac, :unIdDemandeur, :unAppareil,'
                . ':unGroupeUtilisateur, :uneDateDemande, :unEtat)'
        );
        $dateDemande = dateFrancaisVersAnglais($date);
        $requetePrepare->bindParam(':uneAdresseMac', $adresseMac, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unIdDemandeur', $idDemandeur, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unAppareil', $appareil, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unGroupeUtilisateur', $groupeUtilisateur, PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneDateDemande', $dateDemande, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unEtat', $etat, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    /**
     * Confirme l'enregistrement de la demande d'accès au réseau Wifi dont 
     * l'adresse mac est passée en paramètre
     *
     * @param String $adresseMac    Adresse Mac de la demande
     *
     * @return null
     */
    public function confirmeEnregistrementPeripherique($adresseMac) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'UPDATE demande '
                . 'SET etat = \'Accepté\''
                . 'WHERE mac = :uneAdresseMac '
        );
        $requetePrepare->bindParam(':uneAdresseMac', $adresseMac, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    /**
     * Refuse l'enregistrement de la demande d'accès au réseau Wifi dont 
     * l'adresse mac est passée en paramètre
     *
     * @param String $adresseMac    Adresse Mac de la demande
     *
     * @return null
     */
    public function refuseEnregistrementPeripherique($adresseMac) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'UPDATE demande '
                . 'SET etat = \'Refusé\''
                . 'WHERE mac = :uneAdresseMac '
        );
        $requetePrepare->bindParam(':uneAdresseMac', $adresseMac, PDO::PARAM_STR);
        //$requetePrepare->bindParam(':unIdDemandeur', $idDemandeur, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    /**
     * Desactive la demande d'accès au réseau Wifi dont l'adresse mac est 
     * passée en paramètre
     *
     * @param String $adresseMac    Adresse Mac de la demande
     *
     * @return null
     */
    public function desactivePeripherique($adresseMac) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'UPDATE demande '
                . 'SET etat = \'Désactivé\''
                . 'WHERE mac = :uneAdresseMac '
        );
        $requetePrepare->bindParam(':uneAdresseMac', $adresseMac, PDO::PARAM_STR);
        //$requetePrepare->bindParam(':unIdDemandeur', $idDemandeur, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    /**
     * Annule la demande d'accès au réseau Wifi dont l'adresse mac est passée 
     * en paramètre
     *
     * @param String $adresseMac    Adresse Mac de la demande
     *
     * @return null
     */
    public function annuleEnregistrementPeripherique($adresseMac) {
        $requetePrepare = PdoWifi::$monPdo->prepare(
                'DELETE FROM demande '
                . 'WHERE mac = :uneAdresseMac '
        );
        $requetePrepare->bindParam(':uneAdresseMac', $adresseMac, PDO::PARAM_STR);
        //$requetePrepare->bindParam(':unIdDemandeur', $idDemandeur, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

//    public function getLabelUser() {
//        $requetePrepare = PdoWifi::$monPdo->prepare(
//                'SELECT mac AS mac '
//                . 'FROM formulaire '
//                . 'WHERE num = :unIdDemandeur'
//        );
//        $requetePrepare->bindParam(':unNum', $_SESSION['num'], PDO::PARAM_STR);
//        // $requetePrepare->bindParam(':leType', $_SESSION['type'], 
//        // PDO::PARAM_STR);
//        $requetePrepare->execute();
//
//        return $requetePrepare->fetch();
//        $lesLabels = array();
//        while ($laLigne = $requetePrepare->fetch()) {
//            $label = $laLigne['label'];
//            $lesLabels[] = array(
//                'label' => $label
//            );
//        }
//        return $lesLabels;
//    }
//    public function getLesInfosDemandeurEtudiant() {
//        $requetePrepare = PdoWifi::$monPdo->prepare(
//                'SELECT port_etudiant.prenom as prenom, '
//                . 'port_etudiant.nom as nom '
//                . 'FROM port_etudiant'
//                . 'INNER JOIN demande '
//                . 'on port_etudiant.num '
//                . '= demande.num '
//        );
//        $requetePrepare->execute();
//        return $requetePrepare->fetchAll();
//    }
//    
//    public function getLesInfosDemandeurProfesseur() {
//        $requetePrepare = PdoWifi::$monPdo->prepare(
//                'SELECT port_professeur.prenom as prenom, '
//                . 'port_professeur.nom as nom '
//                . 'FROM port_professeur'
//                . 'INNER JOIN demande '
//                . 'on port_professeur.num '
//                . '= demande.num '
//        );
//        $requetePrepare->execute();
//        return $requetePrepare->fetchAll();
//    }
}
