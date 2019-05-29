<?php

/**
 * Contrôleur de Déconnexion du projet WifiSIO
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
    case 'demandeDeconnexion':
        include 'vues/v_deconnexion.php';
        break;

    case 'valideDeconnexion':

        if (estConnecte()) {
            include 'vues/v_deconnexion.php';
        } else {
            ajouterErreur("Vous n'êtes pas connecté");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        }
        break;

    default:
        include 'vues/v_connexion.php';
        break;
}
