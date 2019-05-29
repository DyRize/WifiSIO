<?php
/**
 * Vue de la Connexion du projet WifiSIO
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
    href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css"
    />

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
</script>

<script 
    src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<link 
    href="styles/style.css" 
    rel="stylesheet"
    />

<div class="wrapper fadeInDown">
    <div id="formContent">
        <div 
            class="fadeIn first">
            <img 
                src="images/iconeSIO.png" 
                id="icon" 
                alt="User Icon" 
                />
        </div>

        <form 
            action="index.php?uc=connexion&action=valideConnexion" 
            method="post">

            <input 
                type="text" 
                id="login" 
                class="fadeIn second" 
                name="login" 
                placeholder="Identifiant"
                >

            <input 
                type="password" 
                id="password" 
                class="fadeIn third" 
                name="mdp" 
                placeholder="Mot de Passe"
                >

            <input 
                type="submit" 
                class="fadeIn fourth" 
                name="connexion" 
                value="Connexion"
                >
            
        </form>
    </div>
</div>

