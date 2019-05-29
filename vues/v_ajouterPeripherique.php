<?php
/**
 * Vue d' Ajout d'un Peripherique du projet WifiSIO
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
    href="../vendor/mdi-font/css/material-design-iconic-font.min.css" 
    rel="stylesheet" 
    media="all"
    >

<link 
    href="../vendor/font-awesome-4.7/css/font-awesome.min.css" 
    rel="stylesheet" 
    media="all"
    >

<link 
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" 
    rel="stylesheet"
    >

<link 
    href="../vendor/select2/select2.min.css" 
    rel="stylesheet" 
    media="all"
    >

<link 
    href="../vendor/datepicker/daterangepicker.css" 
    rel="stylesheet" 
    media="all"
    >

<link 
    href="../styles/main.css" 
    rel="stylesheet" 
    media="all"
    >

<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div 
                class="card-heading">
            </div>
            <div class="card-body">
                <h2>
                    Demande d'accès Wifi
                </h2>

                <br>

                <h4 class="title">
                    * Obligatoire
                </h4>

                <form 
                    method="post" 
                    action="index.php?uc=ajouterPeripherique&action=valideAjoutPeripherique"
                    >
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select 
                                type="text" 
                                name="groupeUtilisateur" 
                                required autofocus
                                >

                                <option 
                                    disabled="disabled" 
                                    selected="selected" 
                                    value="">
                                    GROUPE D'UTILISATEUR*
                                </option>

                                <option 
                                    value="SIO1">
                                    SIO1 pour les premières années
                                </option>

                                <option 
                                    value="SLAM">
                                    SLAM
                                </option>

                                <option 
                                    value="SISR">
                                    SISR
                                </option>

                                <option 
                                    value="Enseignant">
                                    Enseignant
                                </option>
                            </select>

                            <div 
                                class="select-dropdown">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select 
                                        type="text" 
                                        name="appareil" 
                                        required autofocus
                                        >

                                        <option 
                                            disabled="disabled" 
                                            selected="selected" 
                                            value="">
                                            APPAREIL
                                        </option>

                                        <option 
                                            value="Ordinateur">
                                            Ordinateur portable
                                        </option>

                                        <option 
                                            value="Téléphone">
                                            Téléphone
                                        </option>

                                        <option 
                                            value="Tablette">
                                            Tablette
                                        </option>

                                        <option 
                                            value="Autre">
                                            Autre
                                        </option>
                                    </select>

                                    <div 
                                        class="select-dropdown">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select 
                                        name="remplacement" 
                                        id="remplacement">

                                        <option 
                                            disabled="disabled" 
                                            selected="selected">
                                            REMPLACEMENT APPAREIL
                                        </option>

                                        <option>
                                            Oui
                                        </option>

                                        <option>
                                            Non
                                        </option>

                                        <?php
                                        foreach ($lesLabels as $unLabel) {
                                            $label = $unLabel['label'];
                                            if ($label == $labelASelectionner) {
                                                ?>
                                                <option selected value="<?php echo $label ?>">
                                                    <?php echo $label ?> </option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $label ?>">
                                                    <?php echo $label ?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>
                        ADRESSE MAC* En minuscule et sans séparateurs
                    </h4>

                    <br>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input 
                                    class="input--style-1" 
                                    type="text" 
                                    name="mac" 
                                    pattern="[a-f0-9]{12}" 
                                    maxlength ='12' 
                                    placeholder="EXEMPLE: 41beadefc5ed"  
                                    required 
                                    >
                            </div>
                        </div>
                    </div>
                    <div class="p-t-20">
                        <button 
                            class="btn btn--radius btn--green" 
                            type="submit">
                            Envoyer
                        </button>

                        <a href="index.php?uc=gererSesPeripheriques&action=afficherPeripheriques">
                            <div class="pull-right">
                                <button 
                                    type="button" 
                                    class="btn btn--radius btn--red">
                                    Retour
                                </button>

                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script 
    src="../vendor/jquery/jquery.min.js">
</script>

<script 
    src="../vendor/select2/select2.min.js">
</script>

<script 
    src="../vendor/datepicker/moment.min.js">
</script>

<script 
    src="../vendor/datepicker/daterangepicker.js">
</script>

<script 
    src="../js/global.js">
</script>