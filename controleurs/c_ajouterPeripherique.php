<?php

/**
 * Contrôleur d' Ajout d'un Peripherique du projet WifiSIO
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
$date = date("d/m/Y");
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'demandeAjoutPeripherique':
        include 'vues/v_ajouterPeripherique.php';
        break;

    case 'valideAjoutPeripherique':
        $groupeUtilisateur = filter_input(INPUT_POST, 'groupeUtilisateur',
                FILTER_SANITIZE_STRING);
        $appareil = filter_input(INPUT_POST, 'appareil',
                FILTER_SANITIZE_STRING);
        $adresseMac = filter_input(INPUT_POST, 'mac',
                FILTER_SANITIZE_STRING);
        $dateDemande = $date;
        $etat = 'Demandé';
        $pdo->valideEnvoiDemande(
                $adresseMac,
                $idDemandeur,
                $appareil,
                $groupeUtilisateur,
                $dateDemande,
                $etat
        );
        header('Location: index.php?uc=accueil');
        break;

    case 'demandeRemplacePeripherique':
        break;

    case 'valideRemplacePeripherique':
        $lesLabels = $pdo->getLabelUser();
        $lesCles = array_keys($lesLabels);
        $labelASelectionner = $lesCles[0];
        header('Location: index.php');
        break;

    default:
        include 'vues/v_accueil.php';
        break;
}