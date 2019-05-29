<?php

/**
 * Index du projet WifiSIO
 *
 * PHP Version 7
 *
 * @category  SLAM5
 * @package   WifiSIO
 * @author    Dylan LE FLOUR <dylan.leflour25@gmail.com>
 * @copyright 2018 TeamSLAM
 */
require_once 'includes/fct.inc.php';
require_once 'includes/class.pdowifi.inc.php';
session_start();
$pdo = PdoWifi::getPdoWifi();
$estConnecte = estConnecte();
require 'vues/v_entete.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
    case 'connexion':
        include 'controleurs/c_connexion.php';
        break;
    case 'accueil':
        include 'controleurs/c_accueil.php';
        break;
    case 'gererSesPeripheriques':
        include 'controleurs/c_gererSesPeripheriques.php';
        break;
    case 'informationsConnexion':
        include 'controleurs/c_informationsConnexion.php';
        break;
    case 'ajouterPeripherique':
        include 'controleurs/c_ajouterPeripherique.php';
        break;
    case 'gererLesPeripheriques':
        include 'controleurs/c_gererLesPeripheriques.php';
        break;
    case 'modeOperatoire':
        include 'controleurs/c_modeOperatoire.php';
        break;
    case 'sauvegardeExport':
        include 'controleurs/c_sauvegardeExport.php';
        break;
    case 'genererScriptSQL':
        include 'controleurs/c_genererScriptSQL.php';
        break;
    case 'genererScriptShell':
        include 'controleurs/c_genererScriptShell.php';
        break;
    case 'deconnexion':
        include 'controleurs/c_deconnexion.php';
        break;
}
require 'vues/v_pied.php';
