<?php
/**
 * Vue de Sauvegarde et d'Export du projet WifiSIO
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
    href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css"
    >

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
</script>

<script 
    src="//code.jquery.com/jquery-1.11.1.min.js">
</script>

<div id="accueil">
    <h2 class="text-center">
        WifiSio 
        <small> 
            - <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?>
        </small>
    </h2>
</div>

<div class="hm-gradient">
    <div class="container text-center mt-4">
        <div class="text-center darken-grey-text mb-4">
            <h1 
                class="font-bold mt-4 mb-3 h5">
                Administrateur
            </h1>
        </div>

        <div class="card-body">
            <a href="index.php?uc=genererScriptSQL&action=afficherGenererScriptSQL">
                <button 
                    type="button" 
                    class="btn btn-success">
                    Scripts SQL
                </button>
            </a>

            <a href="index.php?uc=genererScriptShell&action=afficherGenererScripShell">
                <button 
                    type="button" 
                    class="btn btn-info">
                    Scripts Shell 
                </button>
            </a>
            
            <a href="index.php?uc=accueil">
                <button 
                    type="button" 
                    class="btn btn-danger">
                    Annuler
                </button>
            </a>
        </div>
    </div>
</div>
