<?php

/**
 * Contrôleur de Gestion des Périphériques du projet WifiSIO
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

switch ($action) {
    case 'afficherPeripheriques':
        $lesDemandes = $pdo->getLesInfosToutesDemande();
        include 'vues/v_gererLesPeripheriques.php';
        break;

    case 'confirmeEnregistrementPeripherique':
        $adresseMac = filter_input(INPUT_GET, 'adresseMac', FILTER_SANITIZE_STRING);
        $pdo->confirmeEnregistrementPeripherique($adresseMac);
        $lesDemandes = $pdo->getLesInfosToutesDemande();
        include 'vues/v_gererLesPeripheriques.php';
        break;

    case 'refuseEnregistrementPeripherique':
        $adresseMac = filter_input(INPUT_GET, 'adresseMac', FILTER_SANITIZE_STRING);
        $pdo->refuseEnregistrementPeripherique($adresseMac);
        $lesDemandes = $pdo->getLesInfosToutesDemande();
        include 'vues/v_gererLesPeripheriques.php';
        break;

    case 'desactivePeripherique':
        $adresseMac = filter_input(INPUT_GET, 'adresseMac', FILTER_SANITIZE_STRING);
        $pdo->desactivePeripherique($adresseMac);
        $lesDemandes = $pdo->getLesInfosToutesDemande();
        include 'vues/v_gererLesPeripheriques.php';
        break;

}