<?php

/**
 * Contrôleur de Géneration du Script SQL du projet WifiSIO
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
    case 'afficherGenererScripShell':
        include 'vues/v_genererScriptShell.php';
        break;
    case 'sauvegardeGenererScriptShell':
        shell_exec ('../mysql_dump.sh'); 
        break;

    case 'restaurationScriptSQL':


        include 'vues/v_genererScriptSQL.php';
        break;
}