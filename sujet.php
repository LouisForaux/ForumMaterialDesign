<?php
/**
 * Created by PhpStorm.
 * User: louis
 * Date: 03/07/17
 * Time: 14:14
 */
include 'inc/bdd.php';
include 'functions.php'; ?>

<html>
<head>
    <title>Forum</title>
    <meta charset="utf8" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>

</head>
<body>
<?php include 'navbar.php'; ?>

<?php  $resultats=$connexion->query("SELECT * FROM topics WHERE id=".$_GET['id']);
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() )
{   $title = $resultat->title;
    echo '<div class="col m6 s12"><h3>'.$resultat->title.'</h3></div>';
}
$resultats->closeCursor();?>
<ul class="collection">
    <?php  $resultats=$connexion->query("SELECT * FROM topics WHERE id=".$_GET['id']);
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $resultat = $resultats->fetch() )

    { ?>
        <li class="collection-item avatar">
            <img src="<?php echo pp($resultat->id_user); ?>" alt="" class="circle">
            <p><i>Sujet ouvert par : <?php echo pseudo_id($resultat->id_user); ?></i>
            </p>
            <p class="flow-text"><?php echo $resultat->content; ?></p>
        </li>
    <?php }
    $resultats->closeCursor();?>
</ul>
<ul class="collection">
    <?php  $resultats=$connexion->query("SELECT * FROM reponses WHERE id_sujet=".$_GET['id']);
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $resultat = $resultats->fetch() )

    { ?>
        <li class="collection-item avatar">
            <img src="<?php echo pp($resultat->id_user); ?>" alt="" class="circle">
            <p><i>Réponse de <?php echo pseudo_id($resultat->id_user); ?></i>
            </p>
            <p class="flow-text"><?php echo $resultat->content; ?></p>
        </li>
    <?php }
    $resultats->closeCursor();?>
</ul>

<?php $type="reponse"; include 'add.php'; ?>

<?php include 'footer.php' ?>
</body>
</html>

