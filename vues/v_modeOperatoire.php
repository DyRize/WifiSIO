<?php
/**
 * Vue du Mode Opératoire d'ajout d'une Adresse MAC du projet WifiSIO
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
?>
<link 
    rel="stylesheet" 
    type="text/css" 
    href="../vendor/animate/animate.css"
    >

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/title.css"
    >

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/titleAdmin.css"
    >

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/style.css"
    >

<link 
    href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css"
    >

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
</script>

<script 
    src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<header>
    <h1>
        <div 
            class="animated fadeInLeft">
            Ajout d'une adresse MAC à la liste de 
        </div>

        <div 
            class="animated fadeInRight">
            contrôle d'accès d'une borne wifi (Cisco IOS)
        </div>
    </h1>
</header>

<div class="container mb-5 mt-5">
    <div class="pricing card-deck flex-column flex-md-row mb-3">
        <div class="card card-pricing text-center px-3 mb-4">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-danger text-white shadow-sm">Pour la première fois</span>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>
                        <b>
                            Se connecter en SSH à la borne avec le compte "admin"
                        </b>
                    </li>

                    <li>
                        ssh 10.10.x.x -1 admin
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Saisir le mot de passe associé
                        </b>
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Ajouter l’adresse MAC à la liste de contrôle d’accès
                        </b>
                    </li>

                    <li>
                        nvram set wlan0_ssid0_acl_list=ab:cd:ef:01:23:45,unknown,1\;
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Valider l’ajout
                        </b>
                    </li>

                    <li>
                        nvram commit
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Redémarrer la borne pour une prise en compte de la nouvelle liste de contrôle d’accès
                        </b>
                    </li>

                    <li>
                        reboot
                    </li>
                </ul>
            </div>
        </div>

        <div class="card card-pricing text-center px-3 mb-4">
            <span 
                class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-danger text-white shadow-sm">
                Pour les autres fois
            </span>

            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>
                        <b>
                            Se connecter en SSH à la borne avec le compte "admin"
                        </b>
                    </li>

                    <li>
                        ssh 10.10.x.x -1 admin
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Saisir le mot de passe associé
                        </b>
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Récupérer la liste de contrôle d’accès actuelle dans une variable "listMac"
                        </b>
                    </li>

                    <li>
                        listMac=`nvram show | grep wlan0_ssid0_acl_list | cut -d"=" -f2`
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Ajouter l’adresse MAC à la liste de contrôle d’accès
                        </b>
                    </li>

                    <li>
                        nvram set wlan0_ssid0_acl_list=ab:cd:ef:01:23:45,unknown,1\;
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Valider l’ajout
                        </b>
                    </li>

                    <li>
                        nvram commit
                    </li>

                    <li>
                        -------------------------------------------------------
                    </li>

                    <li>
                        <b>
                            Redémarrer la borne pour une prise en compte de la nouvelle liste de contrôle d’accès
                        </b>
                    </li>

                    <li>
                        reboot
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <div class="card-body">
        <a href="index.php?uc=gererLesPeripheriques&action=afficherPeripheriques">
            <button 
                type="button" 
                class="btn btn-danger">
                Retour
            </button>
        </a>
    </div>
</div>