<?php
/**
 * Vue des Informations de Connexion au réseau Wifi du projet WifiSIO
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
            Informations
        </div>

        <div 
            class="animated fadeInRight">
            de connexion
        </div>
    </h1>
</header>

<div class="container mb-5 mt-5">
    <div class="pricing card-deck flex-column flex-md-row mb-3">
        <div class="card card-pricing text-center px-3 mb-4">
            <span 
                class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">
                Salle 806
            </span>

            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>
                        <b>
                            Sécurité
                        </b>
                    </li>

                    <li>
                        WPA2-PSK(AES)
                    </li>

                    <li>
                        <b>
                            Passphrase
                        </b>
                    </li>

                    <li>
                        2016-BONA-SIO
                    </li>

                    <div class="fadeIn first">
                        <img 
                            src="../images/SIO806.png" 
                            id="qrcode806" 
                            alt="QR Code pour la salle 806" 
                            />
                    </div>
                </ul>
            </div>
        </div>

        <div class="card card-pricing text-center px-3 mb-4">
            <span 
                class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">
                Salle 810
            </span>

            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>
                        <b>
                            Sécurité
                        </b>
                    </li>

                    <li>
                        WPA2-PSK(AES)
                    </li>

                    <li>
                        <b>
                            Passphrase
                        </b>
                    </li>

                    <li>
                        2016-BONA-SIO
                    </li>

                    <div class="fadeIn first">
                        <img 
                            src="../images/SIO810.png" 
                            id="qrcode810" 
                            alt="QR Code pour la salle 810" 
                            />
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <div class="card-body">
        <a href="index.php?uc=accueil">
            <button 
                type="button" 
                class="btn btn-danger">
                Retour
            </button>
        </a>
    </div>
</div>