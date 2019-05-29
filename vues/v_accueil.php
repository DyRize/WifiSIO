<?php
/**
 * Vue de l'Accueil du projet WifiSIO
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
    />

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
</script>

<script 
    src="//code.jquery.com/jquery-1.11.1.min.js">
</script>

<link 
    rel="stylesheet" 
    href="../styles/title.css"
    />

<div id="accueil">
    <h2 class="text-center">
        WifiSio 
        <small> - 
            <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?>
        </small>
    </h2>
</div>

<?php
if ($_SESSION['typeCompte'] == 'utlisateurEtudiant' ||
        $_SESSION['typeCompte'] == 'utilisateurProfesseur') {
    ?>

    <div class="container text-center mt-4">
        <div class="text-center darken-grey-text mb-4">
            <h1 class="font-bold mt-4 mb-3 h5">
                Utilisateur
            </h1>
        </div>

        <div class="card-body">
            <a href="index.php?uc=gererSesPeripheriques&action=afficherPeripheriques">
                <button type="button" class="btn btn-success">
                    Gérer les Périphériques
                </button>
            </a>

            <a href="index.php?uc=informationsConnexion&action=afficherInformationsConnexion">
                <button type="button" class="btn btn-info">
                    Informations de connexion
                </button>
            </a>

            <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                <button type="button" class="btn btn-danger">
                    Déconnexion
                </button>
            </a>
        </div>
    </div>


<?php } else { ?>
    <div class="container text-center mt-4">
        <div class="text-center darken-grey-text mb-4">
            <h1 class="font-bold mt-4 mb-3 h5">
                Administrateur
            </h1>
        </div>

        <div class="card-body">
            <a href="index.php?uc=gererLesPeripheriques&action=afficherPeripheriques">
                <button type="button" class="btn btn-success">
                    Gérer les Périphériques
                </button>
            </a>

            <a href="index.php?uc=sauvegardeExport&action=afficheSauvegardeExport">
                <button type="button" class="btn btn-info">
                    Sauvegarde/Export
                </button>
            </a>

            <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                <button type="button" class="btn btn-danger">
                    Déconnexion
                </button>
            </a>
        </div>
    </div>
<?php } ?>