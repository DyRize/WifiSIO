<?php

/**
 * Contrôleur de Gestion de ses Périphériques du projet WifiSIO
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
$idDemandeur = $_SESSION['num'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
case 'afficherPeripheriques':
    $lesDemandes = $pdo->getLesInfosDemande($idDemandeur);
    include 'vues/v_gererSesPeripheriques.php';
    break;

case 'annuleEnregistrementPeripherique':
        $adresseMac = filter_input(INPUT_GET, 'adresseMac', FILTER_SANITIZE_STRING);
        $pdo->annuleEnregistrementPeripherique($adresseMac);
        include 'vues/v_accueil.php';
        break;

}