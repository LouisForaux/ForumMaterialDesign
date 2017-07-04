<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 11:47
 */
include 'inc/bdd.php';
include 'functions.php'; ?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Forum</title>
    <meta charset="utf8" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

</head>
<body>
<?php include 'navbar.php'; ?>
<div class="row">
<?php  $resultats=$connexion->query("SELECT * FROM categories WHERE id=".$_GET['id']);
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() )
{
    echo '<div class="col m6 s12"><h3>'.$resultat->nom.'</h3></div>';
}
$resultats->closeCursor();?>
    <div class="col m6 s12"><a href="#modal1" class="btn blue darken-4">Poster un nouveau sujet</a> </div>
</div>
<div class="collection">
    <?php  $resultats=$connexion->query("SELECT * FROM topics WHERE cat=".$_GET['id']);
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $resultat = $resultats->fetch() )

{ ?>
    <a href="sujet.php?id=<?php echo $resultat->id; ?>" class="collection-item avatar">
        <img src="<?php echo pp($resultat->id_user); ?>" alt="" class="circle">
        <span class="title"><?php echo $resultat->title; ?></span>
        <p><i>Par : <?php echo pseudo_id($resultat->id_user); ?></i>
        </p>
    </a>
<?php }
$resultats->closeCursor();?>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Poster un nouveau sujet</h4>
        <?php $type="sujet"; include "add.php"; ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
    </div>
</div>

<?php include 'footer.php' ?>
<script>$(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });
</script>
</body>
</html>
