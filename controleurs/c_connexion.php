<?php

/**
 * Contrôleur de Connexion du projet WifiSIO
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
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if (!$uc) {
    $uc = 'demandeConnexion';
}

switch ($action) {

    case 'demandeConnexion':
        include 'vues/v_connexion.php';
        break;

    case 'valideConnexion':
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
        $utilisateurEtudiant = $pdo->getInfosUtilisateurEtudiant($login, $mdp);
        $utilisateurProfesseur = $pdo->getInfosUtilisateurProfesseur(
                $login,
                $mdp);
        $administrateur = $pdo->getInfosAdministrateur($login, $mdp);

        if (!is_array($utilisateurEtudiant) and ! is_array($administrateur) 
                and ! is_array($utilisateurProfesseur)) {
            ajouterErreur('Login ou mot de passe incorrect');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } elseif (is_array($utilisateurEtudiant)) {
            $id = $utilisateurEtudiant['num'];
            $nom = $utilisateurEtudiant['nom'];
            $prenom = $utilisateurEtudiant['prenom'];
            connecter($id, $nom, $prenom);
            $_SESSION['typeCompte'] = 'utlisateurEtudiant';
            header('Location: index.php');
        } elseif (is_array($utilisateurProfesseur)) {
            $id = $utilisateurProfesseur['num'];
            $nom = $utilisateurProfesseur['nom'];
            $prenom = $utilisateurProfesseur['prenom'];
            connecter($id, $nom, $prenom);
            $_SESSION['typeCompte'] = 'utilisateurProfesseur';
            header('Location: index.php');
        } else {
            $id = $administrateur['num'];
            $nom = $administrateur['nom'];
            $prenom = $administrateur['prenom'];
            connecter($id, $nom, $prenom);
            $_SESSION['typeCompte'] = 'administrateur';
            header('Location: index.php');
        }
        break;

    default:
        include 'vues/v_connexion.php';
        break;
}
