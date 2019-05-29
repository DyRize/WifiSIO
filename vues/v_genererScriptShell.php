<?php
/**
 * Vue de Génération du Script SQL du projet WifiSIO
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
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css"
    >

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/titleAdmin.css"
    >

<link 
    href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css"
    >

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/scriptSQL.css"
    >

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
</script>

<script 
    src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<div class="container"> 
    <h1 class="text-center">
        <div class="coloradmin animated fadeInLeft">
            Scripts
        </div>
        
        <div class="animated fadeInRight"> 
            Shell
        </div>
    </h1>
    
    <div class="row">
        <div class="container">
            <a href="index.php?uc=genererScriptShell&action=sauvegardeGenererScriptShell">
                <button 
                    class="btn btn-success btn-1">
                    <span>
                        Sauvegarde de la base de données
                    </span>
                </button>
            </a>
            
            
            <a href="index.php?uc=sauvegardeExport&action=afficheSauvegardeExport">
                <button 
                    class="btn-3 btn btn-danger">
                    <span>
                        Retour
                    </span>
                </button>
            </a>
        </div>
    </div>
</div>