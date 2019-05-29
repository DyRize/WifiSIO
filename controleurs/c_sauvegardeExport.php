<?php

/**
 * Contrôleur de Sauvegarde et d'Export du projet WifiSIO
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
case 'afficheSauvegardeExport':
    include 'vues/v_SauvegardeExport.php';
    break;

}