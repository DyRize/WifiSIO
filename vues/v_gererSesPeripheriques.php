<?php
/**
 * Vue de Gestion de ses Peripheriques du projet WifiSIO
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

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
</script>

<script 
    src="//code.jquery.com/jquery-1.11.1.min.js">
</script>

<script 
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

<script 
    src="http://getbootstrap.com/dist/js/bootstrap.min.js">
</script>

<h1 class="text-center">
    <div 
        class="animated fadeInLeft">
        Gérer les
    </div>

    <div 
        class="animated fadeInRight">
        Périphériques
    </div>
</h1>

<div id="accueil">
    <h2 class="text-center">
        <small>  
            <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?>
        </small>
    </h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php if (!empty($lesDemandes)) { ?>
                <div class="table-responsive">
                    <div class="panel panel-info">
                        <table 
                            id="mytable" 
                            class="table table-bordred table-striped"
                            >

                            <thead class="theadColor"> 
                                <tr>
                                    <th 
                                        class="mac text-center">
                                        Adresse Mac
                                    </th>

                                    <th 
                                        class="appareil text-center">
                                        Appareil
                                    </th>

                                    <th 
                                        class='dateDemande text-center'>
                                        Date de la demande
                                    </th>

                                    <th 
                                        class='etat text-center'>
                                        Etat
                                    </th>

                                    <th 
                                        class='action text-center'>
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <?php
                            foreach ($lesDemandes as $uneDemande) {
                                $mac = $uneDemande['mac'];
                                $appareil = $uneDemande['appareil'];
                                $dateDemande = $uneDemande['dateDemande'];
                                $etat = $uneDemande['etat'];
                                ?>

                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $mac ?>
                                        </td>

                                        <td>
                                            <?php echo $appareil ?>
                                        </td>

                                        <td>
                                            <?php echo $dateDemande ?>
                                        </td>

                                        <td>
                                            <?php echo $etat ?>
                                        </td>

                                        <td>
                                            
                                            <?php if ($etat == 'Demandé') { ?>
                                            <p 
                                                data-placement="top" 
                                                data-toggle="tooltip" 
                                                title="Annuler">
                                                
                                                <a href="index.php?uc=gererSesPeripheriques&action=annuleEnregistrementPeripherique&adresseMac=<?php echo $mac ?>">
                                                    <button 
                                                        class="btn btn-danger btn-xs" 
                                                        data-title="Annuler"
                                                        onclick="return confirm('Voulez-vous vraiment valider?');">
                                                        <span 
                                                            class="glyphicon glyphicon-trash">
                                                        </span>
                                                    </button>
                                                </a>
                                            </p>
                                            
                                        <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="clearfix"></div>
                    </div>

                    <ul class="pagination pull-right">
                        <li 
                            class="disabled">
                            <a href="#">
                                <span 
                                    class="glyphicon glyphicon-chevron-left">                                    
                                </span>
                            </a>
                        </li>

                        <li 
                            class="active">
                            <a href="#">
                                1
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                2
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                3
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                4
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                5
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span 
                                    class="glyphicon glyphicon-chevron-right">                                    
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            <?php } else { ?>
                <h3>Aucune demande d'accès à ce jour</h3>
            <?php } ?>

            <a href="index.php?uc=ajouterPeripherique&action=demandeAjoutPeripherique">
                <button 
                    type="button" 
                    class="btn btn-success pull-left">
                    Ajouter
                </button>
            </a>

            <a href="index.php?uc=accueil">
                <button 
                    type="button" 
                    class="btn btn-danger pull-right">
                    Annuler
                </button>
            </a>
        </div>
    </div>
</div>

<div 
    class="modal fade" 
    id="edit" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="edit" 
    aria-hidden="true"
    >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-hidden="true">
                    <span 
                        class="glyphicon glyphicon-remove" 
                        aria-hidden="true">                            
                    </span>
                </button>

                <h4 
                    class="modal-title custom_align" 
                    id="Heading">
                    Edit Your Detail
                </h4>                
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <input 
                        class="form-control" 
                        type="text" 
                        placeholder="Mohsin"
                        >
                </div>

                <div class="form-group">
                    <input 
                        class="form-control" 
                        type="text" 
                        placeholder="Irshad"
                        >
                </div>

                <div class="form-group">
                    <textarea 
                        rows="2" 
                        class="form-control" 
                        placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan">                            
                    </textarea>
                </div>
            </div>

            <div class="modal-footer ">
                <button 
                    type="button" 
                    class="btn btn-warning btn-lg" 
                    style="width: 100%;">
                    <span 
                        class="glyphicon glyphicon-ok-sign">                            
                    </span> 
                    Update
                </button>
            </div>
        </div>
    </div>
</div>

<div 
    class="modal fade" 
    id="delete" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="edit" 
    aria-hidden="true"
    >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-hidden="true">
                    <span 
                        class="glyphicon glyphicon-remove" 
                        aria-hidden="true">                            
                    </span>
                </button>

                <h4 
                    class="modal-title custom_align" 
                    id="Heading">
                    Supprimer ce périphérique
                </h4>
            </div>

            <div class="modal-body">
                <div 
                    class="alert alert-danger">
                    <span 
                        class="glyphicon glyphicon-warning-sign">                            
                    </span> 
                    Êtes-vous sûr de vouloir effacer cet enregistrement ?
                </div>
            </div>

            <div class="modal-footer ">
                <button 
                    type="button" 
                    class="btn btn-success">
                    <span 
                        class="glyphicon glyphicon-ok-sign">                            
                    </span> 
                    Oui
                </button>

                <button 
                    type="button" 
                    class="btn btn-default" 
                    data-dismiss="modal">
                    <span 
                        class="glyphicon glyphicon-remove">                            
                    </span> 
                    Non
                </button>
            </div>
        </div>
    </div>
</div>

<link
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" 
    rel="stylesheet" 
    id="bootstrap-css">

<script 
    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
</script>

<script 
    src="//code.jquery.com/jquery-1.11.1.min.js">
</script>

<link 
    rel="stylesheet" 
    type="text/css" 
    href="../styles/title.css"
    >

<script 
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

<script 
    src="http://getbootstrap.com/dist/js/bootstrap.min.js">
</script>